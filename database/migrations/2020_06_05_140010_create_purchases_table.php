<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('drug_id');
            $table->foreign('drug_id')
                ->references('id')
                ->on('drugs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('details')->nullable();
            $table->string('total_discount')->nullable();
            $table->string('total_amount')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
