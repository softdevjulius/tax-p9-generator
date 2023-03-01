<?php

use App\Models\P9;
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
            $table->string("account_type")->default(P9::ACCOUNT_TYPES['INDIVIDUAL']);
            $table->string("year")->default(2023);
            $table->string("name")->nullable();
            $table->string("kra_pin")->nullable();
            $table->string("basic_salary")->nullable();
            $table->string("duration")->nullable();
            $table->string("phone")->nullable();
            $table->string("mpesa_phone")->nullable();
            $table->string("transaction_code")->nullable();
            $table->decimal("amount_paid",20)->nullable();
            $table->string("email")->nullable();
            $table->decimal("amount",20)->default(0);
            $table->decimal("tax",20)->default(0);
            $table->decimal("nssf",20)->default(0);
            $table->boolean("should_pay_nssf")->default(true);
            $table->decimal("nhif",20)->default(0);
            $table->boolean("should_pay_nhif")->default(true);

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
