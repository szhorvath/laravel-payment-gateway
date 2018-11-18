<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Streaming Media Player',
            'description' => 'Just plug your Fire TV Stick into an HDTV and start streaming in minutes. Use the included Alexa Voice Remote to search across apps and find the best way to watch. The Fire TV Stick has the fastest Wi-Fi and most accurate voice search of any streaming media stick. Shows start faster and stream more smoothly than ever before.',
            'price' => 24.99,
            'discount' => 10,
            'currency' => 'gbp',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Philips S5420/06 AquaTouch Wet & Dry',
            'description' => 'Protects 10x versus a regular blade*, enjoy a fast shave with MultiPrecision Blade System - blades lift then cut long and short hairs Get a close shave even on the neck and jaw line, five-direction flex heads with five independent movements ensure close skin contact Use wet or dry - 100% waterproof',
            'price' => 160.50,
            'discount' => 65,
            'currency' => 'gbp',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Bang & Olufsen Beoplay H4 Wireless Headphones',
            'description' => 'Premium wireless, over-ear headphones with Bang & Olufsen Signature Sound Designed with clean lines, minimalist expression and a focus on the pure essentials. Audio cord 1.2 meter',
            'price' => 249.99,
            'discount' => 114.01,
            'currency' => 'gbp',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('products')->insert([
            'name' => 'Nylabone Puppy Starter Kit',
            'description' => 'Ideal kit for helping puppies through various chewing stages Encourages healthy, non-destructive chewing habits Helps Clean teeth and remove tartar Provides entertainment for your puppy Includes a chicken flavoured Dura Chew, a chicken flavoured flexichew puppy bone and a bacon ',
            'price' => 9.99,
            'discount' => 5,
            'currency' => 'gbp',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
