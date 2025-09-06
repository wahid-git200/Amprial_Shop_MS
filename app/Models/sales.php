<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_category',
        'quantity',
        'price',
        'total_price',
        'properties',
        'image'

    ];

    protected $casts = [
        'properties' => 'array', // ویژگی‌ها به صورت آرایه قابل دسترسی
        'sold_at' => 'datetime',
    ];
    // اگر بخواهید timestamps به صورت خودکار مدیریت شوند، این گزینه فعال است
    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sale) {
            if ($sale->image && file_exists(public_path($sale->image))) {
                unlink(public_path($sale->image));
            }
        });
    }
}
