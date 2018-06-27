<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = [
            [
                'question' => 'I ..... tennis every Sunday morning.',
                'option1' => 'playing',
                'option2' => 'play',
                'option3' => 'am playing',
                'option4' => 'am play',
                'answer' => '3',
                'added_by' => '2',
                'updated_by' => '2',
                'course_id' => '4',
            ],
            [
                'question' => 'Don\'t make so much noise. Noriko ..... to study for her ESL test!',
                'option1' => 'try',
                'option2' => 'tries',
                'option3' => 'tried',
                'option4' => 'is trying',
                'answer' => '4',
                'added_by' => '2',
                'updated_by' => '2',
                'course_id' => '4',
            ],
            [
                'question' => 'Jun-Sik ..... his teeth before breakfast every morning.',
                'option1' => 'will cleaned',
                'option2' => 'is cleaning',
                'option3' => 'cleans',
                'option4' => 'clean',
                'answer' => '2',
                'added_by' => '2',
                'updated_by' => '2',
                'course_id' => '4',
            ],
            [
                'question' => 'Sorry, she can\'t come to the phone. She ..... a bath!',
                'option1' => 'is having',
                'option2' => 'having',
                'option3' => 'have',
                'option4' => 'has',
                'answer' => '4',
                'added_by' => '3',
                'updated_by' => '3',
                'course_id' => '5',
            ],
            [
                'question' => 'Don\'t make so much noise. Noriko ..... to study for her ESL test!',
                'option1' => 'try',
                'option2' => 'tries',
                'option3' => 'tried',
                'option4' => 'is trying',
                'answer' => '4',
                'added_by' => '3',
                'updated_by' => '3',
                'course_id' => '5',
            ],
            [
                'question' => 'I ..... tennis every Sunday morning.',
                'option1' => 'playing',
                'option2' => 'play',
                'option3' => 'am playing',
                'option4' => 'am play',
                'answer' => '3',
                'added_by' => '3',
                'updated_by' => '3',
                'course_id' => '5',
            ],
        ];
        foreach ($question as $key => $value) {
            Question::create($value);
        }
    }
}
