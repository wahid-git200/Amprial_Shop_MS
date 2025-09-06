<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('product_id', 30);     // رفرنس به محصول
            $table->string('name');              // نام ویژگی (مثلاً رنگ، سایز، حافظه)
            $table->string('value');             // مقدار ویژگی (مثلاً آبی، 512GB)
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // اگر محصول حذف شد، ویژگی‌ها هم حذف شوند
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
}
