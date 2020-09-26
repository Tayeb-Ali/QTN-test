<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('branches', function (Blueprint $table) {

            $table->id();
            $table->string('name',191);
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->text('address');
            $table->foreign('manager_id')->references('id')->on('managers');
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
        Schema::drop('branches');
    }
}
