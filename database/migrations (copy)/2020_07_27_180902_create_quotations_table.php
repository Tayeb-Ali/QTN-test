<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {

            $table->id();
            $table->string('reference_no');
//            $table->unsignedBigInteger('user_id');
//            $table->unsignedBigInteger('supplier_id')->nullable();
//            $table->unsignedBigInteger('customer_id');
//            $table->unsignedBigInteger('department_id');
            $table->bigInteger('item');
            $table->double('total_qty')->nullable();
            $table->double('total_discount')->nullable();
            $table->double('total_tax')->nullable();
            $table->double('total_price')->nullable();
            $table->double('order_tax')->nullable();
            $table->double('order_tax_rate')->nullable();
            $table->double('grand_total')->nullable();
            $table->bigInteger('quotation_status');
            $table->string('document', 191)->nullable();
            $table->text('note')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('department_id')->constrained();
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
        Schema::dropIfExists('artist_proposes');
    }
}
