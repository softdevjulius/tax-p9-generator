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
        Schema::create('p9_income_expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId("income_id")
                ->constrained("p9_incomes")
                ->cascadeOnDelete()->cascadeOnUpdate();
            $table->decimal("expense_amount")->nullable();
            $table->string("withholding_tax")->nullable();
            $table->string("company_name")->nullable();
            $table->string("company_pin")->nullable();
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
        Schema::dropIfExists('p9_income_expenses');
    }
};
