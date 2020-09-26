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
            $table->double('total_qty')->nullable();
            $table->double('total_price')->nullable();
            $table->bigInteger('quotation_status');
            $table->string('document', 191)->nullable();
            $table->text('note')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->foreignId('customer_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->timestamps();
            $table->softDeletes();

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
