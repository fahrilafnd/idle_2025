<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrmawasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ormawas = ['Himasif', 'Himatif', 'Laos', 'HMIF'];
        foreach($ormawas as $ormawa){
            DB::table('ormawas')->insert([
                'nama_ormawa' => $ormawa
            ]);
        }
    }
}
