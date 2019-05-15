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
            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam maecenas sed enim ut sem.', '1', '1'],
            ['Mi eget mauris pharetra et. A diam consectetur adipiscing elit, maecenas sed enim ut sem.', '1', '2'],

            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam maecenas sed enim ut sem.', '2', '1'],
            ['Mi eget mauris pharetra et. A diam consectetur adipiscing elit, maecenas sed enim ut sem.', '2', '2'],

            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam maecenas sed enim ut sem.', '3', '1'],
            ['Mi eget mauris pharetra et. A diam consectetur adipiscing elit, maecenas sed enim ut sem.', '3', '2'],

            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam maecenas sed enim ut sem.', '4', '1'],
            ['Mi eget mauris pharetra et. A diam consectetur adipiscing elit, maecenas sed enim ut sem.', '4', '2'],

            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam maecenas sed enim ut sem.', '5', '1'],
            ['Mi eget mauris pharetra et. A diam consectetur adipiscing elit, maecenas sed enim ut sem. ', '5', '2'],

            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A diam maecenas sed enim ut sem.', '6', '1'],
            ['Mi eget mauris pharetra et. A diam consectetur adipiscing elit, maecenas sed enim ut sem.', '6', '2']
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
