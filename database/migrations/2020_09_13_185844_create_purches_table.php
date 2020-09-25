<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->string('purches_no');
            $table->date('date');
            $table->string('description')->nullable();
            $table->double('buyiny_qty');
            $table->double('unit_price');
            $table->double('buyiny_price');
            $table->tinyInteger('status')->default('1')->comment('0=pending,1=Approved');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purches');
    }
}
