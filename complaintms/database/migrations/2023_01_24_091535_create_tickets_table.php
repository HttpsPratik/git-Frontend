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
        Schema::create('tickets', function (Blueprint $table) {
            //$table->id();
            $table->uuid('id')->primary();
            $table->string( 'status');
            $table->timestamp('status_date');
            $table->foreignUuid('user_id')->nullable();
            $table->string( 'ticket_number')->unique();
            $table->foreignUuid('fiscal_year_id');
            $table->string('subject')->nullable();
            $table->foreignUuid('category_id');
            $table->foreignUuid('medium_id');
            $table->boolean('visible');
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
        Schema::dropIfExists('tickets');
    }
};
