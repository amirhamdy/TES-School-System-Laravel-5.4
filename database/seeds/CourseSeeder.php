<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [
            [
                'name' => 'Arabic',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '2',
                'level' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Math I',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '2',
                'level' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Math II',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '3',
                'level' => '2',
                'status' => '1'
            ],
            [
                'name' => 'English I',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '2',
                'level' => '1',
                'status' => '1'
            ],
            [
                'name' => 'English II',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '3',
                'level' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Algebra I',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '2',
                'level' => '1',
                'status' => '1'
            ],
            [
                'name' => 'Algebra II',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '3',
                'level' => '2',
                'status' => '1'
            ],
            [
                'name' => 'French',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '2',
                'level' => '1',
                'status' => '0'
            ],
            [
                'name' => 'Germany',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '3',
                'level' => '2',
                'status' => '1'
            ],
            [
                'name' => 'Science',
                'added_by' => '1',
                'updated_by' => '1',
                'professor' => '2',
                'level' => '1',
                'status' => '1'
            ]
        ];
        foreach ($course as $key => $value) {
            Course::create($value);
        }
    }
}
