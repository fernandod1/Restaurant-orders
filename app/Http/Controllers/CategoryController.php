<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
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
        if (auth()->user()->role > 0){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        $categories = Category::paginate();
        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * $categories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role > 0){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        $category = new Category();
        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role > 0){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        request()->validate(Category::$rules);
        $category = Category::create($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Categoría creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->role > 1){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        $category = Category::find($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role > 0){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if (auth()->user()->role > 0){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        request()->validate(Category::$rules);
        $category->update($request->all());

        return redirect()->route('categories.index')
            ->with('success', 'Categoría actualizada con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (auth()->user()->role > 0){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        $category = Category::find($id)->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada con éxito.');
    }
}
