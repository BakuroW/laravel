<?php namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model {

    /** For Published and unpublished posts */

    public function getPublishedPosts(){
      /*  $posts = Post::latest('published_at')
            ->where('published_at', '<=', Carbon::now())
            ->get();*/
       //$posts = \DB::table('published_at')->published()->get();
        $posts = DB::table('posts')->where('published_at', '<=', Carbon::now())
                                   ->where('published', '=', 1)
                                   ->orderBy('published_at','desc')
                                   ->get();
        return $posts;
    }

    public  function getUnPublishedPosts () {
        //$posts = $this->latest('published_at')->unpublished()->get();
        $posts =  DB::table('posts')->where('published_at', '=>', Carbon::now())
                                    ->orWhere('published', '=', 0)
                                    ->orderBy('published_at','desc')
                                    ->get();
        return $posts;
    }

    //шаблон запроса (scope) *область для выборок*
    //в query передаем наш запрос
    /*public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now())
            ->where('published', '=', 1);
    }
    public function scopeUnPublished($query) {
        $query->where('published_at', '=>', Carbon::now())
            ->orWhere('published', '=', 0);
    }*/

    /** For Category  */
    public  function getCategory1() {
        $posts = $this->latest('Category')->where('Category','=','Category1')->get();
        return $posts;
    }

    public  function getCategory2() {
        $posts = $this->latest('Category')->where('Category','=','Category2')->get();
        return $posts;
    }
////////////////////////////////////////////////////////////////////////////
    public  function getCategory($request) {
        $posts = $this->latest('Category')->where('Category','=',$request)->get();
        return $posts;
    }
///////////////////////////////////////////////////////////////////////////////
    /** */

    protected $fillable = [
        'slug',
        'title',
        'excerpt',
        'content',
        'Category',
        'published',
        'published_at'
    ];




}
