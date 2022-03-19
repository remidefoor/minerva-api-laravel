<?php

namespace Database\Seeders;

use App\Modules\Users\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Excited!!!'],
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Perron 9 3/4'],
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Hogwarts'],
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Ron and Hermione'],
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Dumbledore'],
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Voldemort'],
            ['ISBN' => '9789076174105', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Loved every bit!'],
            ['ISBN' => '9789076174112', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Wizarding World'],
            ['ISBN' => '9789076174181', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'J. K. Rowling'],
            ['ISBN' => '9789076174204', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Fantastic Beasts'],
            ['ISBN' => '9789061697015', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Harry Potter and the Cursed Child'],
            ['ISBN' => '9789061697671', 'user_id' => User::where('email', '=', 'harry.potter@hogwarts.wiz')->first()->id, 'note' => 'Hyped!!!']
        ]);
    }
}
