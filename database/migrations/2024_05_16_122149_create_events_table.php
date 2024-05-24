<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('star_id')->nullable();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->String("photo")->nullable();


            $table->string('name');
            $table->text('description');
            $table->dateTime('event_date');
            $table->timestamps();


            $table->foreign('user_id')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');

          /*  $table->foreign('star_id')
                ->on('stars')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('university_id')
                ->on('universities')
                ->references('id')
                ->onDelete('cascade');   */


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
