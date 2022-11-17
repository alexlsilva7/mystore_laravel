<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
    public function update(ProductStoreRequest $request, Product $product)
    {
        $input = $request->validated();

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            //delete old image
            if ($product->cover) {
                Storage::delete($product->cover);
            }
            $input['cover'] = $request->file('cover')->store('covers');
        }
        $product->fill($input);
        $product->save();
        return redirect()->route('admin.products.index');

    }




    //mostra a página de criar
    public function create()
    {
        return view('admin.create');
    }

    //recebe a requisição de criar
    public function store(ProductStoreRequest $request)
    {
        $input = $request->validated();
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
        //delete image from storage
        Storage::delete($product->cover??'');
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    //delete image
    public function deleteImage(Product $product)
    {
        //delete image from storage
        Storage::delete($product->cover??'');
        $product->cover = null;
        $product->save();
        return Redirect::back();
    }

}
