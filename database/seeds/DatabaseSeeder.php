<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        $this->call('PostsSeeder');


		// $this->call('UserTableSeeder');
	}

}

class PostsSeeder extends  Seeder {

    public function run(){
        DB::table('Posts')->delete();
        Post::create([
            'title'    => 'First Post',
            'slug'     => 'first-post',
            'excerpt'  => '<b>First post body</b>',
            'content'  => '<b>Content First post body</b>',
            'published'=> true,
            //'published_at' => DB::rav('NOW()') //для DataTime
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        Post::create([
            'title'    => 'Second Post',
            'slug'     => 'second-post',
            'excerpt'  => '<b>Second post body</b>',
            'content'  => '<b>Content Second post body</b>',
            'published'=> false,
            //'published_at' => DB::rav(NOW()) //для DataTime
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        Post::create([
            'title'    => 'Third Post',
            'slug'     => 'third-post',
            'excerpt'  => '<b>Third post body</b>',
            'content'  => '<b>Content Third post body</b>',
            'published'=> false,
            //'published_at' => DB::rav(NOW()) //для DataTime
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);


    }

}