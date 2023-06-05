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
        Schema::create('p9_auditors', function (Blueprint $table) {
            $table->id();
            $table->foreignId("p9_id")
                ->constrained("p9_s")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("self_auditor_pin")->nullable();
            $table->string("wife_auditor_pin")->nullable();
            $table->string("self_auditor_name")->nullable();
            $table->string("wife_auditor_name")->nullable();
            $table->string("self_auditor_certificate_date")->nullable();
            $table->string("wife_auditor_certificate_date")->nullable();
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
        Schema::dropIfExists('p9_auditors');
    }
};
