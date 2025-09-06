<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $table = 'product_attributes';
    public $incrementing = false;   // چون id دستی می‌سازیم
    protected $keyType = 'string';  // نوع کلید اصلی رشته‌ای

    protected $fillable = [
        'product_id',
        'name',
        'value',
    ];

    // ارتباط با محصول
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $date = now()->format('ynd');

            $lastId = self::where('id', 'like', "pa{$date}-%")
                ->orderBy('id', 'desc')
                ->value('id');

            if ($lastId) {
                $parts = explode('-', $lastId);
                $lastNumber = (int) end($parts);
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            $model->id = "pa{$date}-{$newNumber}";
        });
    }
}
