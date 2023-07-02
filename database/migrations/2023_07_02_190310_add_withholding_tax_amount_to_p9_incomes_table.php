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
        Schema::table('p9_incomes', function (Blueprint $table) {
            $table->decimal("withholding_tax_amount",20)
                ->after("withholding_tax")
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p9_incomes', function (Blueprint $table) {
            $table->dropColumn([
                "withholding_tax_amount"
            ]);
        });
    }
};
