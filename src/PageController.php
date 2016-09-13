<?php

namespace Kirschbaum\LaravelSparkPages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller {
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages::create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $published = false;
        if(null != $request->input('published')){
            $published = true;
        }
        Page::create([
            'slug' => $request->input('slug'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'published' => $published,
        ]);

        return redirect("/{$request->input('slug')}");
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        if($page->published){
            return view('pages.display', compact(['page']));
        }
        return redirect('/login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        return view('pages::create_edit', compact(['page']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $slug)
    {
        $page = Page::whereSlug($slug)->firstOrFail();
        $published = false;
        if(null != $request->input('published')){
            $published = true;
        }

        $page->update([
            'slug'      => $request->input('slug'),
            'title'     => $request->input('title'),
            'body'      => $request->input('body'),
            'published' => $published,
        ]);
        return redirect("/{$request->input('slug')}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Page::whereSlug($slug)->firstOrFail()->delete();
    }
}