<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Photo;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreatePostRequest;
use App\Models\Comment;
use Illuminate\Support\Str;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts_array = Category::pluck('category', 'id')->all();
        return view('admin.posts.create', compact('posts_array'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $post_data = $request->all();

        $user = Auth::user();

        if ($file = $request->file('photo_id')) {

            $name = $file->getClientOriginalName() . time();
            $file->move('images', $name);

            $post_photo = Photo::create(['path' => $name]);

            $post_data['photo_id'] = $post_photo->id;
        }

        $post_data['body'] = nl2br($request->body);

        $user->posts()->create($post_data);
        Session::flash('post.create', 'The Post has been CREATED and PUBLISHED to blog.');
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function post($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('blog', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $posts_array = Category::pluck('category', 'id')->all();
        $post->body = Str::replaceArray('<br />', ['', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''], $post->body);
        return view('admin.posts.edit', compact('post', 'posts_array'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $post_data = $request->all();

        if ($file = $request->file('photo_id')) {
            $name = $file->getClientOriginalName();
            $file->move('images', $name);

            $post_photo = Photo::create(['path' => $name]);
            $post_data['photo_id'] = $post_photo->id;
        }
        $post_data['body'] = nl2br($request->body);
        $user->posts()->whereId($id)->first()->update($post_data);
        Session::flash('post.update', 'The Post has been UPDATED successfully!');

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        unlink(public_path() . $post->photo->path);

        Auth::user()->posts()->whereId($id)->first()->delete();

        Session::flash('post.delete', 'The Post has been DELETED successfuly.');
        return redirect()->route('posts.index');
    }
}
