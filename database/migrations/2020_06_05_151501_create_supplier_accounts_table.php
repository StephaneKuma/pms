<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('purchase_id');
            $table->foreign('purchase_id')
                ->references('id')
                ->on('purchases')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('amount')->nullable();
            $table->string('due')->nullable();
            $table->string('paid')->nullable();
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
        Schema::dropIfExists('supplier_accounts');
    }
}
