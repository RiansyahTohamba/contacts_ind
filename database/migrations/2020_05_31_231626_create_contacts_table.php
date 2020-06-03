<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('email'); 
            $table->string('handphone'); 
            // $table->foreign('province_id')->references('id')->on('provinces');
            // $table->foreign('regency_id')->references('id')->on('regencies');
            // $table->foreign('district_id')->references('id')->on('districts');
            // $table->foreign('village_id')->references('id')->on('villages');
            $table->text('detail_address'); 
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
        Schema::dropIfExists('contacts');
    }
}
