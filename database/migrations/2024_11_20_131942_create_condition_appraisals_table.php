<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionAppraisalsTable extends Migration
{
    public function up()
    {
        Schema::create('condition_appraisals', function (Blueprint $table) {
            $table->id();
            $table->string('file_name'); // File name
            $table->string('file_path'); // Path to the stored file
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('condition_appraisals');
    }
}
