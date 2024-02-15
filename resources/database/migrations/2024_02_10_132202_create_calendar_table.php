<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;   
use Illuminate\Support\Facades\Schema;

class CreateCalendarTable extends Migration
{
    public function up()
    {
        Schema::create('calendar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('calendar');
    }
}
