<?php

namespace App\Http\Controllers;

use App\Categ;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categs')->get();
        return view('pos.categories.view', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pos.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $category = new Categ(
            [
                'name' => $name,
                'slug' => $slug
            ]
        );

        $category->save();

        return redirect('/categories')->with('success', 'Category Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categs  $categs
     * @return \Illuminate\Http\Response
     */
    public function show(Categs $categs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categs  $categs
     * @return \Illuminate\Http\Response
     */
    public function edit(Categs $categs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categs  $categs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categs $categs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categs  $categs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categs $categs)
    {
        //
    }
}
