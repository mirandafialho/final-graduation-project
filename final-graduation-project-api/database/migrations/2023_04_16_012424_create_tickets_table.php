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
            $table->string('ticket');
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('service_catalogue_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->string('subject');
            $table->text('description');
            $table->enum('status', ['open', 'working', 'closed']);
            $table->dateTime('date_start');
            $table->dateTime('date_end');
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
