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
        Schema::create('p9_deductions', function (Blueprint $table) {
            $table->id();

            $table->foreignId("p9_id")
                ->constrained("p9_s")
                ->onDelete("cascade")->onUpdate("cascade");

            $table->string("name")->nullable();
            $table->decimal("amount",20)->default(0);

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
        Schema::dropIfExists('p9_deductions');
    }
};
