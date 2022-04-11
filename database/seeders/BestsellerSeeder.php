<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BestsellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id1 = DB::table('bestsellers')->insertGetId(['copies_sold' => 200000000]);
        $id2 = DB::table('bestsellers')->insertGetId(['copies_sold' => 200000000]);
        $id3 = DB::table('bestsellers')->insertGetId(['copies_sold' => 120000000]);
        $id4 = DB::table('bestsellers')->insertGetId(['copies_sold' => 100000000]);
        $id5 = DB::table('bestsellers')->insertGetId(['copies_sold' => 100000000]);
        $id6 = DB::table('bestsellers')->insertGetId(['copies_sold' => 100000000]);

        DB::table('bestsellers_language')->insert([
            ['bestseller_id' => $id1, 'language' => 'en', 'title' => 'A Tale of Two Cities'],
            ['bestseller_id' => $id1, 'language' => 'nl', 'title' => 'Een verhaal over twee steden'],
            ['bestseller_id' => $id2, 'language' => 'en', 'title' => 'The Little Prince'],
            ['bestseller_id' => $id2, 'language' => 'nl', 'title' => 'De kleine prins'],
            ['bestseller_id' => $id3, 'language' => 'en', 'title' => 'Harry Potter and the Philosopher\'s Stone'],
            ['bestseller_id' => $id3, 'language' => 'nl', 'title' => 'Harry Potter en de steen der wijzen'],
            ['bestseller_id' => $id4, 'language' => 'en', 'title' => 'And Then There Were None'],
            ['bestseller_id' => $id4, 'language' => 'nl', 'title' => 'En toen waren er nog maar...'],
            ['bestseller_id' => $id5, 'language' => 'en', 'title' => 'Dream of the Red Chamber'],
            ['bestseller_id' => $id5, 'language' => 'nl', 'title' => 'De droom van de rode kamer'],
            ['bestseller_id' => $id6, 'language' => 'en', 'title' => 'The Hobbit'],
            ['bestseller_id' => $id6, 'language' => 'nl', 'title' => 'De Hobbit'],
        ]);
    }
}
