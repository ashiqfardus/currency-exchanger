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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_no');
            $table->integer('user_id');
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('account_details');
            $table->string('payment_details');
            $table->integer('send_id');
            $table->integer('receive_id');
            $table->decimal('send_unit',10,2)->default(0);
            $table->decimal('receive_unit',10,2)->default(0);
            $table->decimal('send_amount',10,2)->default(0);
            $table->decimal('receive_amount',10,2)->default(0);
            $table->string('payment_proof');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
};
