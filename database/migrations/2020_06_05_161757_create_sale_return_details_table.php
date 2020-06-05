<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleReturnDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_return_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_return_id');
            $table->foreign('sale_return_id')
                ->references('id')
                ->on('sale_returns')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('quantity');
            $table->float('total');
            $table->float('total_deduction');
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
        Schema::dropIfExists('sale_return_details');
    }
}
