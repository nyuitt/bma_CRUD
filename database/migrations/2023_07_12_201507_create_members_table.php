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
    Schema::create('members', function (Blueprint $table) {
        $table->id();
        $table->string('first_name', 255)->nullable(false)->default('');
        $table->string('last_name', 255);
        $table->string('email', 255)->unique()->nullable(false)->default('');
        $table->enum('gender', ['Male', 'Female']);
        $table->string('password', 255)->nullable(false)->default('');
        $table->string('birthdate',)->nullable(false)->default('');
        $table->dateTime('created')->nullable(false)->default(\DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('members');
    }
};
