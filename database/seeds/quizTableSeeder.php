<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Faker\Provider\en_US\Text;
use Illuminate\Database\Eloquent\Model;

class quizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $today = Carbon::today()->toDateString();
        $faker = Faker::create();
        DB::table('quiz')->insert([
            'name' => str_random(10),
            'start_date' => $today,
            'end_date' => $today,
            'question1' => "This is a dummy question.",
            'question2' => "This is a dummy question.",
            'question3' => "This is a dummy question.",
            'question4' => "This is a dummy question.",
            'question5' => "This is a dummy question.",
            'question6' => "This is a dummy question.",
            'question7' => "This is a dummy question.",
            'question8' => "This is a dummy question.",
            'question9' => "This is a dummy question.",
            'question10' => "This is a dummy question.",
            'answer_for_question1' => 'January 1986',
            'answer_for_question2' => $faker->name,
            'answer_for_question3' => 'Kuala Lumpur, Malaysia',
            'answer_for_question4' => 'Virtual Roadshow.',
            'answer_for_question5' => str_random(10).'@gmail.com',
            'answer_for_question6' => $faker->text,
            'answer_for_question7' => $faker->jobTitle,
            'answer_for_question8' => $faker->sentence,
            'answer_for_question9' => "None of above",
            'answer_for_question10' => "All of above",
            'campaign_id' => null,
            'deleted' => 0,
            'status' => 1,
            'created_by' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
