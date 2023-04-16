<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('service_catalogues_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['open', 'idle', 'working', 'closed']);
            $table->dateTime('date_start');
            $table->dateTime('date_finish');
            $table->dateTime('date_finished')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
