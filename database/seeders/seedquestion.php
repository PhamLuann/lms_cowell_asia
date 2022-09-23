<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class seedquestion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { for($i=1;$i<=20;$i++){
        DB::table('questions')->insert([
            'name' => Str::random(10),
            'answer1' => Str::random(3)."dap $i",
            'answer2' => Str::random(3).'@gmail.com',
            'answer3' => Str::random(3)."dap $i",
            'answer4' => Str::random(3)."dap $i",
            'correct_answer' => "$i%4+1",
            'type' => "$i%4+1",
            'point'=> 10,
        ]);
        }
        for($i=1;$i<=20;$i++){
            DB::table('exams')->insert([
                'name' => Str::random(10),
                'description' => Str::random(3)."dap $i",
                'tag' => Str::random(3).'@gmail.com',
                 'maxpoint'=>0,
                'time_limit' => $i*4+1,
            ]);
            }
    }
}
