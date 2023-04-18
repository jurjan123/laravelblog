<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Project::class, 10)->create();
        Project::factory()->count(10)->create();
        
        foreach(Project::all() as $project){
            $users = User::inRandomOrder()->take(rand(1,2))->pluck("id");
            foreach(Role::all() as $role)
            $project->users()->attach($users, ["role_id" => Role::inRandomOrder()->take(rand(1,5))->pluck("id")]);
        }
    }
}
