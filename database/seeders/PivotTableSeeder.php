<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Project::all() as $project){
            $users = User::inRandomOrder()->take(rand(1,2))->pluck("id");
            $project->users()->attach($users, ["role_id" => Role::inRandomOrder()->take(rand(1,4))->pluck("id")]);
        }
    }
}

