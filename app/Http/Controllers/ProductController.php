<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id]))
        {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image_path,
                'quantity' => '1',
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ], 200);
    }

    public function showCart()
    {
        $carts = session()->get('cart');
        return view('products.cart', compact('carts'));
    }


    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity)
        {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('products.components.cart_component', compact('carts'))->render();
            return response()->json(['cart_component' => $cartComponent, 'status' => 200]);
        }
    }

    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $cart_components = view('products.components.cart_component', compact('carts'))->render();
            return response()->json(['cart_component' => $cart_components, 'code' => 200 ]);
        }

    }
}
