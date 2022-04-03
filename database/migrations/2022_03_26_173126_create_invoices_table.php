<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->json('order');
            $table->json('customer');
            $table->json('user');
            $table->json('branch');
            $table->json('products');
            $table->string('products_string');
            $table->string('total');
            $table->string('pay');
            $table->string('discount');
            $table->string('change');
            $table->string('status')->default(0);

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
}
