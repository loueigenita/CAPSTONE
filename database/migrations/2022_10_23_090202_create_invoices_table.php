<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_no');
            $table->date('invoice_date');
            $table->date('due_date');
            $table->string('product_name');
            $table->integer('product_qty')->default(1);
            $table->decimal('product_price');
            $table->string('client');
            $table->double('total')->nullable();
            $table->string('client_address');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('invoices');
    }
};
