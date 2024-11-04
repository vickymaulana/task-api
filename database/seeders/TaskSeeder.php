<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            //
            Task::create([
                'title' => 'Task One',
                'description' => 'This is the description of task one.',
                'is_completed' => false
                ]);
                Task::create([
                'title' => 'Task Two',
                
                'description' => 'This is the description of task two.',
                'is_completed' => true
                ]);
        }
    }
    