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
        Schema::create('p9_bank_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("p9_id")
                ->constrained("p9_s")
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->string("bank_name");
            $table->string("branch_name");
            $table->string("city");
            $table->string("account_holder_name");
            $table->string("account_number");
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
        Schema::dropIfExists('p9_bank_details');
    }
};
