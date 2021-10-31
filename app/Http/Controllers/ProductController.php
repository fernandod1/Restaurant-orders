<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * Class ProductController
 * @package App\Http\Controllers
 */
class ProductController extends Controller
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
        if ((auth()->user()->role > 1) || (auth()->user()->active == 0) ){
            return redirect()->route('home')
            ->with('error', 'Su cuenta no está activada.');
        }
        $products = Product::paginate();
        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * $products->perPage());
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
        $product = new Product();
        $category = Category::all();    

        return view('product.create', compact('product','category'));
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
        request()->validate(Product::$rules);
        $product = Product::create($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Producto añadido con éxito.');
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
        $product = Product::find($id);

        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->role > 1){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        $product = Product::find($id);
        $category = Category::all();

        return view('product.edit', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (auth()->user()->role > 1){
            return redirect()->route('home')
            ->with('error', 'No tiene permisos para realizar esta operación.');
        }
        request()->validate(Product::$rules);
        $product->update($request->all());
        return redirect()->route('products.index')
            ->with('success', 'Producto actualizado con éxito.');
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
        $product = Product::find($id)->delete();
        return redirect()->route('products.index')
            ->with('success', 'Producto eliminado con éxito.');
    }
}
