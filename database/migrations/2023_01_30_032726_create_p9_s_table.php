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
        Schema::create('p9_s', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->string("account_type");
            $table->string("organisation_name")->nullable();
            $table->string("kra_pin")->nullable();
            $table->string("basic_salary")->nullable();
            $table->string("duration")->nullable();
            $table->string("phone")->nullable();
            $table->string("mpesa_phone")->nullable();
            $table->string("email")->nullable();
            $table->decimal("amount",20)->nullable();
            $table->decimal("tax",20)->nullable();
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
        Schema::dropIfExists('p9_s');
    }
};
