<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RasioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rasios')->insert([[
            'name'=>'Rasio Likuiditas',
            'tipe_rasio'=> 'Rasio Lancar'
        ],
        [
            'name'=>'Rasio Likuiditas',
            'tipe_rasio'=> 'Rasio Cepat'
        ],
        [
            'name'=>'Rasio Likuiditas',
            'tipe_rasio'=> 'Rasio Kas atas Aktiva Lancar'
        ],
        [
            'name'=>'Rasio Likuiditas',
            'tipe_rasio'=> 'Rasio Kas atas Hutang Lancar'
        ],
        [
            'name'=>'Rasio Likuiditas',
            'tipe_rasio'=> 'Rasio Aktiva Lancar dan Total Aktiva'
        ],
        [
            'name'=>'Rasio Likuiditas',
            'tipe_rasio'=> 'Aktiva Lancar atas Total Hutang'
        ],
        [
            'name'=>'Rasio Solvabilitas',
            'tipe_rasio'=> 'Cakupan Bunga'
        ],
        [
            'name'=>'Rasio Solvabilitas',
            'tipe_rasio'=> 'Utang Terhadap Ekuitas'
        ],
        [
            'name'=>'Rasio Solvabilitas',
            'tipe_rasio'=> 'Utang Terhadap Total Aset'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Margin Laba'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Return on Asset'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Return On Investment'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Return on Total Asset'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Basic Earning Power'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Contribution Margin'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Rasio Rentabilitas'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Inventori Turn Over'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Receivable Turn Over'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Fixed Asset Turn Over'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Total Asset Turn Over'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Periode Penagihan Piutang'
        ],
        [
            'name'=>'Rasio Profitabilitas',
            'tipe_rasio'=> 'Earning Per Share'
        ],
        ]);
    }
}
