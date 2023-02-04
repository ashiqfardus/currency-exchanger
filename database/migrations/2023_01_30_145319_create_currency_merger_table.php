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
        Schema::create('currency_merger', function (Blueprint $table) {
            $table->id();
            $table->integer('send_id')->default(0);
            $table->decimal('min',10,2)->default(0);
            $table->decimal('max',10,2)->default(0);
            $table->integer('receive_id')->default(0);
            $table->decimal('sent_unit',10,2)->default(0);
            $table->decimal('receive_unit',10,2)->default(0);
            $table->integer('created_by')->default(0);
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
        Schema::dropIfExists('currency_merger');
    }
};
