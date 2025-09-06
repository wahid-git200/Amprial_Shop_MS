<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCatagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'discription'
    ];
    public $incrementing = false;   // چون id دستی می‌سازیم
    protected $keyType = 'string';  // نوع کلید اصلی رشته‌ای

    public function products()
    {
        return $this->hasMany(\App\Models\Products::class, 'category_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $date = now()->format('ynd');

            $lastId = self::where('id', 'like', "ct{$date}-%")
                ->orderBy('id', 'desc')
                ->value('id');

            if ($lastId) {
                $parts = explode('-', $lastId);
                $lastNumber = (int) end($parts);
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            $model->id = "ct{$date}-{$newNumber}";
        });
        static::deleting(function ($category) {
            $category->products()->each(function ($product) {
                $product->delete();
            });
        });
    }
}
