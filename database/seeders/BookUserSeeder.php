<?php

namespace Database\Seeders;

use App\Modules\Users\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_user')->insert([
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id],
            ['ISBN' => '9789076174112', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id],
            ['ISBN' => '9789076174181', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id],
            ['ISBN' => '9789076174204', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id],
            ['ISBN' => '9789061697015', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id],
            ['ISBN' => '9789061697671', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id],
            ['ISBN' => '9789061698319', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id]
        ]);
    }
}
