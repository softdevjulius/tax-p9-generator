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
        Schema::create('return_information', function (Blueprint $table) {
            $table->id();

            $table->foreignId("p9_id")
                ->constrained("p9_s")
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string("period_from");
            $table->string("period_to");
            $table->boolean("has_other_income");
            $table->boolean("has_partnership_income");
            $table->boolean("has_estate_trust_income");
            $table->boolean("has_employer_car");
            $table->boolean("has_mortgage");
            $table->boolean("has_home_ownership_plan");
            $table->boolean("has_life_insurance_policy");
            $table->boolean("has_commercial_vehicle");
            $table->boolean("has_foreign_income");
            $table->boolean("has_disability_exemption_certificate");
            $table->boolean("declare_wife_income");
            $table->string("wife_pin");
            $table->boolean("wife_has_other_income");
            $table->boolean("wife_has_disability_exemption_certificate");
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
        Schema::dropIfExists('return_information');
    }
};
