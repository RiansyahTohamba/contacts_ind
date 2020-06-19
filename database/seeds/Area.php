<?php

use Illuminate\Database\Seeder;

class Area extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->clean_seed();
        $prov_jkt_id = DB::table('provinces')->insertGetId(['name' => 'DKI JAKARTA']);        
        $reg_jaksel_id = DB::table('regencies')->insertGetId(['name' => 'KOTA JAKARTA SELATAN','province_id' => $prov_jkt_id]);
        $dis_jaga_id = DB::table('districts')->insertGetId(['name' => 'JAGAKARSA','regency_id'=> $reg_jaksel_id]);
		DB::table('villages')->insert([
			['district_id'=>$dis_jaga_id, 'name'=> 'SRENGSENG SAWAH'],
			['district_id'=>$dis_jaga_id, 'name'=> 'CIGANJUR']
		]);

        $prov_jabar_id = DB::table('provinces')->insertGetId(['name' => 'JAWA BARAT']);
        $reg_bks_id = DB::table('regencies')->insertGetId(['name' => 'KABUPATEN BEKASI','province_id' => $prov_jabar_id]);
        $dis_setu_id = DB::table('districts')->insertGetId(['name' => 'SETU','regency_id'=> $reg_bks_id]);
        DB::table('districts')->insert(['name' => 'SERANG BARU','regency_id'=> $reg_bks_id]);

		DB::table('villages')->insert([
			['district_id'=>$dis_setu_id, 'name'=> 'TAMAN SARI'],
			['district_id'=>$dis_setu_id, 'name'=> 'TAMAN RAHAYU'],
			['district_id'=>$dis_setu_id, 'name'=> 'BURANGKENG']
		]);
    }

    private function clean_seed(){
    	DB::table('villages')->delete();   	
    	DB::table('districts')->delete();
    	DB::table('regencies')->delete();
		DB::table('provinces')->delete();
    	echo "Areas's Records has deleted\n";
    }
}
