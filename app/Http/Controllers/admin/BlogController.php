<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\State;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activeStatedIds =  State::activeStates()->pluck('id');
        return view('panel.admin.blog.index')->with([
            'blogs' => Blog::where('is_deleted','0')->whereIn('state_id' , $activeStatedIds )->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.admin.blog.create')->with([
            'categories' => Category::all(),
            'states' => State::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {
        Blog::create($request->all());
        return redirect()->route('admin.blog.index')->with('success', 'your new blog created susseccfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('panel.admin.blog.edit')->with([
            'categories' => Category::all(),
            'states' => State::activeStates(),
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->all());
        return redirect()->back()->with('success', 'your new blog updated susseccfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->is_deleted = 1;
        $blog->save();
        return redirect()->back()->with('success' , 'the blog was deleted successfully');
    }
}
