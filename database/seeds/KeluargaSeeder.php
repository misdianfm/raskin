<?php

use Illuminate\Database\Seeder;
use App\Rt;
use App\Rw;
use App\Keluarga;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //sample
        $rt1 = Rt::create(['rt'=>'00X']);
        $rt2 = Rt::create(['rt'=>'00Y']);
        $rw1 = Rw::create(['rw'=>'X00']);
        $rw2 = Rw::create(['rw'=>'Y00']);

        //sample keluarga
       $k1 = Keluarga::create(array(
       	'no_kk' => '123456',
       	'alamat' => 'pasir wetan',
       	'rw_id' => $rw1->id,
       	'rt_id' => $rt1->id));
       $k2 = Keluarga::create(array(
        'no_kk' => '070809',
        'alamat' => 'pasir wetan',
        'rw_id' => $rw2->id,
        'rt_id' => $rt1->id));
    }
}

//$book1 = Book::create(['title'=>'Kupinang Engkau dengan Hamdalah', 'amount'=>3, 'author_id'=>$author1->id]);

