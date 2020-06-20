<?php

use Illuminate\Database\Seeder;

class Contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    	
    	DB::table('contacts')->insert([
    		'name' => 'Muhammad Riansyah Tohamba',
    		'email' => 'mriansyah93@gmail.com',
    		'handphone' => '+6282292319224',
    		'detail_address' => 'Kp. Awirarangan',
	        'province_id' => DB::table('provinces')->where('name','JAWA BARAT')->value('id'),
			'regency_id' => DB::table('regencies')->where('name','KABUPATEN BEKASI')->value('id'),
			'district_id' => DB::table('districts')->where('name','SETU')->value('id'),
			'village_id' => DB::table('villages')->where('name','TAMAN SARI')->value('id')
    	]);
    }
}
