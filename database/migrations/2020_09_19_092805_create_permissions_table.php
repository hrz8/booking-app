<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');

            // columns
            $table->string('code')
                  ->unique();
            $table->string('name');
            $table->string('description');

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
        Schema::dropIfExists('permissions');
    }
}
