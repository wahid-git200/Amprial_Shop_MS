<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $table = 'purchases';

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
        'properties' => 'array',
    ];

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->total_price = $model->quantity * $model->price;
        });



        // delete image when a sale is deleted
        static::deleting(function ($sale) {
            if ($sale->image && file_exists(public_path($sale->image))) {
                @unlink(public_path($sale->image));
            }
        });
    }
}
