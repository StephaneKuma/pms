<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplierDrugTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_drug', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('drug_id');
            $table->foreign('drug_id')
                ->references('id')
                ->on('drugs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('price');
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
        Schema::dropIfExists('supplier_drug');
    }
}
