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
        Schema::create('p9_streams', function (Blueprint $table) {
            $table->id();
            $table->foreignId("p9_id")->nullable()
                ->constrained("p9_s")
//                ->onDelete("cascade")->onUpdate("cascade")
            ;

            $table->foreignId("stream_id")->nullable()
                ->constrained("streams")
//                ->onDelete("cascade")->onUpdate("cascade")
            ;

            $table->string("business_name")->nullable();
            $table->string("pin")->nullable();
            $table->string("name")->nullable();
            $table->decimal("amount",20)->default(0);
            $table->decimal("expense",20)->default(0);


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
        Schema::dropIfExists('p9_streams');
    }
};
