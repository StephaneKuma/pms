<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('drug_form_id');
            $table->foreign('drug_form_id')
                ->references('id')
                ->on('drug_forms')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('generic_name')->nullable();
            $table->string('strength')->nullable();
            $table->string('box_size')->nullable();
            $table->string('trade_price')->nullable();
            $table->string('mrp')->nullable();
            $table->string('box_price')->nullable();
            $table->text('details')->nullable();
            $table->text('side_effect')->nullable();
            $table->string('expire_date')->nullable();
            $table->string('instock')->nullable();
            $table->string('w_discount')->nullable();
            $table->string('image')->nullable();
            $table->integer('short_stock')->nullable();
            $table->boolean('favourite')->default(false);
            $table->enum('discount', ['Yes', 'No'])->default('No');
            $table->integer('sale_quantity')->nullable();
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
        Schema::dropIfExists('drugs');
    }
}
