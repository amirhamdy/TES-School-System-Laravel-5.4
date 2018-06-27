<?php

use App\Parents;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parent = [
            [
                'student_id' => '1',
                'user_id' => '6',
            ],
        ];
        foreach ($parent as $key => $value) {
            Parents::create($value);
        }
    }
}
