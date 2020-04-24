<?php

use App\Category;
use App\User;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $author1 = User::create([

            'name' => 'todd',
            'email' => 'todd@gmail.com',
            'password' => Hash::make('password'),

         ]);

         $author2 = User::create([

            'name' => 'dan',
            'email' => 'dan@gmail.com',
            'password' => Hash::make('password'),

         ]);


        $category1 = Category::create([

            'name' => 'News'

         ]);

         $category2 = Category::create([

            'name' => 'Marketing'

         ] );

         $category3 = Category::create([

            'name' => 'Hirimg'

         ] );

        $post1 = $author1->posts()->create([

            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'TheSaaS is a responsive, professional ',
            'content' => 'and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexi',
            'category_id' => $category2->id,
            'image' => 'posts/3.jpg',


        ]);

        $post2 = $author2->posts()->create([

            'title' => 'We relocated our office to a new designed garage',
            'description' => 'TheSaaS is a responsive, professional ',
            'content' => 'and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexi',
            'category_id' => $category3->id,
            'image' => 'posts/4.jpg'


        ]);

        $post3 = $author1->posts()->create([

            'title' => 'Best practices for minimalist design with example',
            'description' => 'TheSaaS is a responsive, professional ',
            'content' => 'and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexi',
            'category_id' => $category2->id,
            'image' => 'posts/1.jpg'


        ]);

        $post4 = $author2->posts()->create([

            'title' => 'New published books to read by a product designer',
            'description' => 'TheSaaS is a responsive, professional ',
            'content' => 'and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexi',
            'category_id' => $category1->id,
            'image' => 'posts/2.jpg'


        ]);

        $tag1 = Tag::create([

            'name' => 'Design'
        ]);
        $tag2 = Tag::create([

            'name' => 'Customers'

        ]);
        $tag3 = Tag::create([

            'name' => 'Job'
        ]);
        $tag4 = Tag::create([

            'name' => 'Screenshot'
        ]);


        $post1->tags()->attach([$tag1->id , $tag3->id]);
        $post2->tags()->attach([$tag2->id , $tag3->id]);
        $post3->tags()->attach([$tag1->id , $tag2->id]);
    }
}
