<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')
                ->references('id')
                ->on('sales')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('total_deduction');
            $table->string('total_amount');
            $table->string('counter');
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
        Schema::dropIfExists('sale_returns');
    }
}
