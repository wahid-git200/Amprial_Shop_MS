<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;


    // چون id ما رشته‌ای هست و auto increment نیست
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'stock',
        'images',
        'description',
    ];

    // ارتباط با کتگوری
    public function category()
    {
        return $this->belongsTo(ProductCatagory::class, 'category_id');
    }

    // ارتباط با جدول مشخصات

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class, 'product_id', 'id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $date = now()->format('ynd');

            $lastId = self::where('id', 'like', "pro{$date}-%")
                ->orderBy('id', 'desc')
                ->value('id');

            if ($lastId) {
                $parts = explode('-', $lastId);
                $lastNumber = (int) end($parts);
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            $model->id = "pro{$date}-{$newNumber}";
        });
        static::deleting(function ($product) {
            if ($product->images) {
                $images = json_decode($product->images, true);
                if (is_array($images)) {
                    foreach ($images as $img) {
                        $path = public_path($img);
                        if (file_exists($path)) {
                            @unlink($path); // درست‌ترین حالت
                        }
                    }
                }
            }
        });
    }
}
