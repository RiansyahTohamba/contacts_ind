<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $driver = Schema::connection($this->getConnection())->getConnection()->getDriverName();
        Schema::table('contacts', function (Blueprint $table) use ($driver){
            if ('sqlite' === $driver) {
                $table->foreignId('province_id')->nullable();
                $table->foreignId('regency_id')->nullable();
                $table->foreignId('district_id')->nullable();
                $table->foreignId('village_id')->nullable();
            } else {
                $table->foreignId('province_id')->constrained();
                $table->foreignId('regency_id')->constrained();
                $table->foreignId('district_id')->constrained();
                $table->foreignId('village_id')->constrained();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            //
        });
    }
}
