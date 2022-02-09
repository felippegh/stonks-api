<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration {

    /**
     * Run the migrations.
     * @return void
     */
    public function up() {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('symbol')->default('');
            $table->double('open')->default(0.0);
            $table->double('high')->default(0.0);
            $table->double('low')->default(0.0);
            $table->double('close')->default(0.0);
            $table->double('volume')->default(0.0);
            $table->unsignedInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down() {
        Schema::dropIfExists('stocks');
    }
}
