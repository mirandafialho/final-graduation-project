<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_level_agreements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('response_time');
            $table->integer('resolution_time');
            $table->enum('available', ['24x7', '8x5']);
            $table->enum('priority', ['critical', 'urgent', 'normal']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_level_agreements');
    }
};
