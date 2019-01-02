<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Tag::truncate();
        Tag::create(['name' => 'Gold']);
        Tag::create(['name' => 'Premium']);
        Tag::create(['name' => 'Black']);
    }
}
