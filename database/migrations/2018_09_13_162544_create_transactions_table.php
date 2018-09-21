<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->dateTime('date');
            $table->integer('type');
            $table->integer('status');
            $table->dateTime('lasteventdate');
            $table->decimal('grossamount', 8, 2);
            $table->decimal('discountamount', 8, 2);
            $table->decimal('feeamount', 8, 2);
            $table->decimal('netamount', 8, 2);
            $table->decimal('extraamount', 8, 2);
            $table->decimal('installmentcount', 8, 2);
            $table->integer('itemcount');
            $table->integer('payment_code');
            $table->integer('payment_type');
            $table->string('paymentLink')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
