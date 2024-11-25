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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('travel_type')->nullable();
            $table->datetime('travel_date')->nullable();
            $table->string('from_station')->nullable();
            $table->string('to_station')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('charge_amount')->nullable();
            $table->string('passenger_name')->nullable();

            // Card holder name
            $table->string('holder_name')->nullable();
            $table->string('card_no')->nullable();
            $table->string('cvv')->nullable();
            $table->string('expiry_date')->nullable();
            $table->text('billing_address')->nullable();
            $table->string('alternate_no')->nullable();
            $table->string('pf_charge_method')->nullable();
            $table->string('confirmation_code')->nullable();
            $table->string('net_agent_sale')->nullable();
            $table->text('reject_reason')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('pending');


            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users') 
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
};
