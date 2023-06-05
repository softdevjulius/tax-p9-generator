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
        Schema::create('p9_tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId("p9_id")
                ->constrained("p9_s")
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string("pin")->nullable();
            $table->string("name")->nullable();
            $table->string("lr_number")->nullable();
            $table->string("building")->nullable();
            $table->string("street")->nullable();
            $table->string("city")->nullable();
            $table->string("county")->nullable();
            $table->string("district")->nullable();
            $table->string("locality")->nullable();
            $table->string("area")->nullable();
            $table->string("po_box")->nullable();
            $table->string("po_name")->nullable();
            $table->string("postal_code")->nullable();
            $table->string("date_from")->nullable();
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
        Schema::dropIfExists('p9_tenants');
    }
};
