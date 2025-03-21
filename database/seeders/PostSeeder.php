<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $posts=[
            [
                'title' => 'First Post',
                'body' => 'This is the first post body'
            ],
            [
                'title' => 'Second Post',
                'body' => 'This is the second post body'
            ],
            [
                'title' => 'Third Post',
                'body' => 'This is the third post body'
            ]
        ];

        foreach($posts as $post){
            \App\Models\Post::create($post);
        }
        
    }
}
