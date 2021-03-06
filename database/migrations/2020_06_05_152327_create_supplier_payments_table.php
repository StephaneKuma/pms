<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_payments', function (Blueprint $table) {
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
            $table->string('type');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')
                ->references('id')
                ->on('banks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dateTime('issue_date');
            $table->string('receiver_name');
            $table->string('receiver_contact');
            $table->string('paid_amount');
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
        Schema::dropIfExists('supplier_payments');
    }
}
