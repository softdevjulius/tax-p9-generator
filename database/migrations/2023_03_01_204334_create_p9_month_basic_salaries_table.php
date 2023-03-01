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
        Schema::create('p9_month_basic_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId("p9_id")
                ->constrained("p9_s")
                ->cascadeOnDelete()->cascadeOnUpdate();

            $table->string("month_name");
            $table->decimal("amount",20)->default(0);
            $table->decimal("allowance",20)->default(0);
            $table->decimal("deduction",20)->default(0);
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
        Schema::dropIfExists('p9_month_basic_salaries');
    }
};
