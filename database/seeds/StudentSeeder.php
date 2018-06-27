<?php

use App\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = [
            [
                'level' => '1',
                'user_id' => '4',
                'gender' => 'Female',
                'phone' => '01006548720',
                'address' => 'Cairo, Egypt',
            ],
            [
                'level' => '2',
                'user_id' => '5',
                'gender' => 'Female',
                'phone' => '01006548720',
                'address' => 'Cairo, Egypt',
            ]
        ];
        foreach ($student as $key => $value) {
            Student::create($value);
        }
    }
}
