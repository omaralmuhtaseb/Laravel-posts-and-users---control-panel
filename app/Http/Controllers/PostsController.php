<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use App\Tag;
class PostsController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if ($categories->count() ==0){
            return redirect()->route('category.create');
        }
        $tag=Tag::all();
        if ($tag->count() ==0){
            return redirect()->route('tag.create');
        }

        return view('posts.create')->with('categories',$categories)
            ->with('tags',$tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'contents'=>'required',
            'image'=>'required|image',
            'category_id'=>'required',
            'tags'=>'required',
        ]);

        $image= $request->image;
        $image_new_name=time().$image->getClientOriginalName();
        $image->move('uploads/posts',$image_new_name);

        $post= Post::create([
            'title'=>$request->title,
            'content'=>$request->contents,
            'category_id'=>$request->category_id,
            'image'=>'uploads/posts/'.$image_new_name,
            'slug'=>Str::of($request->title)->slug('-')
        ]);
        $post->tags()->attach($request->tags);
        return redirect()->back();
    }


    public function trashed(){
        $posts=Post::onlyTrashed()->get();

        return view('posts.soft-deleted')->with('posts',$posts);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post',$post)
            ->with('categories',Category::all())->with('tags',Tag::all());
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
        $post=Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'contents'=>'required',
            'category_id'=>'required',

        ]);
        if ($request->hasFile('image')){
             $image=$request->image;
             $image_new_name=time().$image->getClientOriginalName();
             $image->move('uploads/posts/',$image_new_name);

             $post->image='uploads/posts/'.$image_new_name;
        }
        $post->title=$request->title;
        $post->content=$request->contents;
        $post->category_id=$request->category_id;
        $post->save();

        //this will update tags select or unselect
        $post->tags()->sync($request->tags);

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect()->back();
    }


    public function hard_delete($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        return redirect()->route('posts');
    }




}
