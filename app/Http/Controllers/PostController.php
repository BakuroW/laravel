<?php namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller {

	public function index(Post $postModel)
        //index(подставляем экземпляр класса пост)
	{
        //$posts = Post::all();//достаем все выборку
        //dd($posts);
        //$posts = Post::latest('published_at')->get();//все записи из таблицы post отсортированые по оределенному полю
	    //latest('*название таблицы*') сортировка в обратном порядке(последнее первые)
//      $posts = Post::latest('published_at')->where('published_at', '<=', Carbon::now())->get();//published_at должно быть <= текущей дате(Carbon::now())
        $posts = $postModel->getPublishedPosts();
        return view('post.index', ['posts' => $posts]);
	}



    public function unpublished(Post $postModel) {

        $posts = $postModel->getUnPublishedPosts();
        //dd($posts);
        return view('post.index', ['posts' => $posts]);

    }

    /** For Category */

    public function category1(Post $postModel){
    $posts = $postModel->getCategory1();
    return view('post.index', ['posts' => $posts]);
}

    public function category2 (Post $postModel){
        $posts = $postModel->getCategory2();
        return view('post.index', ['posts' => $posts]);
    }

//////////////////////////////////////////////////////////////////////////////

    public function ShowCategory (Post $postModel, Request $request) {
        dd($request->all());
        /*$posts = $postModel->getCategory2($request);
        return view('post.index', ['posts' => $posts]);*/
    }

/////////////////////////////////////////////////////////////////////////////


	public function create()
	{
        if (Auth::check()){
            return view('post.create');
        }else{
            return view('post.error');
        }
	}


	public function store(Post $postModel, PostFormRequest $request)
	{
        //dd($request->all());

        /*$v = Validator::make($request->all(), [
            'title'        => 'required | min: 3 | max:25',
            'slug'         => 'required | min: 3 | max:50',
            'excerpt'      => 'required | min: 3 | max:300',
            'content'      => 'required | min: 3 | max:300',
            'Category'     => 'required | min: 3 | max:30',
            'published'    => '',
            'published_at' => ''
        ]);*/

        /*if ($request->fails())
        {
            return redirect()->back()->withErrors($request->errors());
        }*/

        /*if($request->passes()){*/
            $postModel->create($request->all());
            return redirect()->route('posts');

        /*}*//*else {
            return redirect()->back()->withErrors($request->errors());

        }*/




        /*}*/

            /*postModel->create($request->all());
            return redirect()->route('posts');*/

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function edit($id)
	{
        //dd($id);
        $post = Post::find($id);
        return view('post.edit',compact('post'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update($id, PostFormRequest $request)

    {
        /*if ($request->fails()) {
            return redirect()->back()->withErrors($request->errors());
        } else {*/

            $post = Post::findOrFail($id);
            $input = $request->all();
            $post->fill($input)->save();
            return redirect()->route('posts');
        /*}*/

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
        //dd($id);
        $post = Post::find($id);
        /*dd($id);*/
        $post->delete();

        //Session::flash('message', 'Successfully deleted the post!');
        // redirect
        return redirect()->back();


    }

}
