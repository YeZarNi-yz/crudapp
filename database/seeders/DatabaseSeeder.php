<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseSeeder extends Seeder
{
  use HasFactory;
  /**
   * Seed the application's database.
   */
  public function run()
  {
    Article::factory()->count(20)->create();
    User::factory()->count(20)->create();
  }
}
