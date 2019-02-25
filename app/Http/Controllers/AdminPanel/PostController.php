<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all();

        return view('admin.main.index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.main.create', [
            'categories_mas' => [],
            'categories' => Category::get(),
            'countries_mas' => [],
            'countries' => Country::get(),
        ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::transaction(function () use ($request) {
            $img = $request->file('url_image')->store('uploads', 'public');

            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->post_content;
            $post->description = $request->post_description;
            $post->url_image = $img;
            $post->save();

            if ($request->input('categories_mas')):
                $post->categories()->attach($request->input('categories_mas'));
            endif;

            if ($request->input('countries_mas')):
                $post->countries()->attach($request->input('countries_mas'));
            endif;

        });

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.main.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.main.edit', [
            'categories_mas' => [],
            'categories' => Category::get(),
            'countries_mas' => [],
            'countries' => Country::get(),
        ])->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {

            $post = Post::find($id);

            $post->countries()->detach();
            $post->categories()->detach();

            Storage::disk('public')->delete( $post->url_image);

            if ($request->input('categories_mas')):
                $post->categories()->attach($request->input('categories_mas'));
            endif;

            if ($request->input('countries_mas')):
                $post->countries()->attach($request->input('countries_mas'));
            endif;


            $img = $request->file('url_image')->store('uploads', 'public');

            DB::table('posts')->where('id', '=', $id)->update([
                'title' => $request->title,
                'content' => $request->post_content,
                'url_image' => $img,
                'description' => $request->post_description,
            ]);


        }, 5);

        return redirect('AdminPanel/posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $post = Post::where('id', $id)->first();
            Storage::disk('public')->delete( $post->url_image);
            $post->categories()->detach();
            $post->countries()->detach();
            $post->delete();


        }, 5);


        return redirect('AdminPanel/posts');
    }
}
