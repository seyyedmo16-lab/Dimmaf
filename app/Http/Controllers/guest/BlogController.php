<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\State;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index(State $state = null)
    {
        $query = Blog::query();
        if(!is_null($state)){        // indexing blogs based on particular state
            $query->where('state_id', $state->id);
        }
        if(session('lang') == 'en' || session('lang') == null){
            $query->where('body_en','<>','');
        }elseif (session('lang') == 'fa'){
            $query->where('body_fa','<>','');
        }

        $blogs = $query->where('is_deleted','0')->orderBy('created_at', 'desc')->paginate(10);
        
        // redirect to landing if there was no blog 
        if(count($blogs) == 0 ){
            return redirect()->route('home');
        }
        return view('panel.guest.blog.index')->with([
            'blogs' => $blogs  ,
            'recentBlogs' => Blog::orderBy('created_at','desc')->limit(5)->get(), // for sidebar
            'state' => $state, // State specified 
            'states' => State::activeStates() // for sidebar
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function show(Blog $blog)
    {
        if($blog->state->is_active == 0){
            return redirect()->back();
        }
        if ((session('lang') == 'en' || session('lang') == null) && empty($blog->body_en)){
            return redirect()->route('home');
        }elseif ((session('lang') == 'fa') && empty($blog->body_fa)){
            return redirect()->route('home');
        }
        return view('panel.guest.blog.show')->with([
            'blog' => $blog,
            'states' => State::all(), // for sidebar
            'recentBlogs' => Blog::orderBy('created_at','desc')->limit(5)->get(), // for sidebar

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
