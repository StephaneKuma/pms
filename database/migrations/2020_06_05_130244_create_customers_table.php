<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name');
            $table->enum('type', ['Regular', 'Wholesale'])->default('Regular');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->string('image')->nullable();
            $table->string('regular_discount')->nullable();
            $table->string('target_amount')->nullable();
            $table->string('target_discount')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
