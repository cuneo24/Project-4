<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $comments = [
            ['This is neat!', '1', '3'],
            ['This is dumb!', '1', '3']
        ];

        foreach ($comments as $commentData) {
            $comment = new Comment();
            $comment->comment = $commentData[0];
            $comment->mod_id = $commentData[1];
            $comment->user_id = $commentData[2];
            $comment->save();
        }
    }
}
