<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', [
            'products' => $products,
        ]);
    }
    //mostra a página de editar
    public function edit(Product $product)
    {
        return view('admin.edit', [
            'product' => $product,
        ]);
    }

    //recebe a requisição de editar
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('admin.products.index');
    }

    //mostra a página de criar
    public function create()
    {
        return view('admin.create');
    }

    //recebe a requisição de criar
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric',
            'description' => 'required|min:10',
            'stock' => 'required|numeric',
            'cover' => 'required|file|image',
        ]);
        //save cover
        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $input['cover'] = $request->file('cover')->store('covers');
        }
        //save product
        Product::create($input);
        return redirect()->route('admin.products.index');
    }

    //recebe a requisição de deletar
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

}
