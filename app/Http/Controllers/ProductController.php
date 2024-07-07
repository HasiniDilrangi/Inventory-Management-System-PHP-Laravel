<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function deleteProduct(Product $product){
        if(auth()->user()->id === $product['user_id']){
            $product->delete();
        }
        return redirect('/')->with('success', 'Succesfully Delete product!');

    }
    public function updateProduct(Product $product, Request $request){
        if(auth()->user()->id !== $product['user_id']){
            return redirect('/')->with('error', 'You are not authorized to edit this product!');
        }
        $incomingFilds = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        $incomingFilds['title'] = strip_tags($incomingFilds['title']);
        $incomingFilds['description'] = strip_tags($incomingFilds['description']);
        $incomingFilds['price'] = strip_tags($incomingFilds['price']);

        $product->update($incomingFilds);
        return redirect('/')->with('success', 'Update Product Successfully!');
    }
    public function showEditScreen(Product $product ){
        if(auth()->user()->id !== $product['user_id']){
            return redirect('/')->with('error', 'You are not authorized to edit this product!');
        }

        return view('edit-product', ['product' => $product]);

    }

    public function addProduct(Request $request){
        $incomingFilds = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        $incomingFilds['title'] = strip_tags($incomingFilds['title']);
        $incomingFilds['description'] = strip_tags($incomingFilds['description']);
        $incomingFilds['price'] = strip_tags($incomingFilds['price']);
        $incomingFilds['user_id'] = auth()->id();

        Product::create($incomingFilds);

        return redirect('/')->with('success', 'Add Product Successfully!');
    }
}

