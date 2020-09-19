<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            
            // foreigns
            $table->uuid('user_id');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
            
            // columns
            $table->string('pod_name');
            $table->decimal('discount_percentage', 5, 4)
                  ->unsigned()
                  ->default(0);
            $table->decimal('pay_amount', 15, 2)
                  ->unsigned();
            $table->timestamp('transaction_at');

            // timestamp
            $table->timestamp('created_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                  ->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
