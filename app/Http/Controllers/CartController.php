<?php

namespace App\Http\Controllers;

use App\Model\About;
use App\Model\Accessories;
use App\Model\Product;
use App\Model\Stock;
use App\Model\Country;
use App\Model\Subcategory;
use App\Model\WebBrand;
use App\Model\WebCategory;
use App\Model\WebManufacture;
use App\Model\WebProduct;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function allCartProducts()
    {
        $webCategories = WebCategory::all();
        $webBrands = WebBrand::all();
        $webProducts = Product::where('status', 1)->get();
        $webManufacturers = WebManufacture::all();
        $totalProduct = \App\Model\Cart::all()->count();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $cartProducts = \Cart::content();
        $subcategories = Subcategory::all();
        $abouts = About::first();
        $countries = Country::all();
        return view('version-1.fontend.product.cart', compact(
            'abouts',
            'webProducts',
            'totalPriceSum',
            'cartProducts',
            'totalProduct',
            'webBrands',
            'webCategories',
            'webBrands',
            'webManufacturers',
            'countries'
        ));
    }

    public function showCartProductUpdate(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
        Toastr::success('Cart has been Updated :)', 'Success');
        return redirect()->back();
    }

    public function addToCart($id)
    {
        $products = Product::with('stocks')->where('status', 1)->findOrfail($id);

        $data = [
            'id' => $products->id,
            'name' => $products->name,
            'qty' => 1,
            'price' => $products->sale_price,
            'weight' => 0,
            'options' => [
                'image' => $products->image,
                'sku' => $products->sku,
            ]
        ];
        \Cart::add($data);

        return response()->json(['success' => 'Product added to cart', 'totalItems' => \Cart::count()], 200);

    }

    public function addToCartMultiple(Request $r)
    {
        // return $r;
        $product = Product::with('stocks')->where('status', 1)->findOrfail($r->product_id);

        $data = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $r->amount,
            'price' => $product->sale_price,
            'weight' => 0,
            'options' => [
                'image' => $product->image,
                'sku' => $product->sku,
            ]
        ];
        \Cart::add($data);

        session()->flash('my_success', 'Product added to cart');
        return redirect()->back()->with([
            'success' => 'Product added to cart',
            'totalItems' => \Cart::count()
        ]);
        // return response()->json(['success' => 'Product added to cart', 'totalItems' => \Cart::count()], 200);

    }

    public function addToCartDetails(Request $request, $id)
    {
        $products = Product::where('status', 1)->findOrfail($id);
        $inQtyOutQtyProduct = Stock::where('product_id', $id)->first();

        if ($request->qty <= $request->av_qty) {
            $data = [
                'id' => $products->id,
                'name' => $products->name,
                'qty' => $request->qty,
                'price' => $products->sale_price,
                'weight' => 0,
                'options' => [
                    'image' => $products->image,
                    'sku' => $products->sku,
                ]
            ];
            \Cart::add($data);
//            if (!empty($data)) {
//                Stock::updateOrCreate(
//                    [
//                        'product_id' => $products->id
//                    ],
//                    [
//                        'out_qty' => $request->qty + $inQtyOutQtyProduct->out_qty,
//                        'available_qty' => $request->out_qty,
//                    ]
//                );
//            }
            Toastr::success('ProductTrait added to cart', 'success');
            return redirect()->back();
        }else {
            return redirect()->back()->with('message', 'Available Qty is "'.$request->av_qty.'" ');
        }

    }

    public function addToCartAccessories($id)
    {
        $products = Accessories::findOrfail($id);

        $data = [
            'id' => $products->id,
            'name' => $products->name,
            'qty' => 1,
            'price' => $products->price,
            'weight' => 0,
            'options' => [
                'image' => $products->image,
                'sku' => $products->sku,
            ]
        ];
        \Cart::add($data);
        return response()->json(['success' => 'ProductTrait added to cart', 'totalItems' => \Cart::count()], 200);
    }

    public function accessoriesWiseListProducts($id)
    {
        $product = Accessories::findOrfail($id);

        $data = [];
        $data['product_id']=$id;
        $data['name']=$product->name;
        $data['qty']=1;
        $data['price']=$product->price;
        $data['sub_total']=$product->price;
        \DB::table('carts')->insert($data);
        return response()->json(['success'=>'Wise List added']);
    }

    public function accessoriesAddToCartDetails(Request $request, $id)
    {
        $products = Accessories::findOrfail($id);
        $inQtyOutQtyProduct = Stock::where('accessories_id', $id)->first();

        if ($request->qty <= $request->av_qty) {
            $data = [
                'id' => $products->id,
                'name' => $products->name,
                'qty' => $request->qty,
                'price' => $products->price,
                'weight' => 1,
                'options' => [
                    'image' => $products->image,
                    'sku' => $products->sku,
                ]
            ];
            \Cart::add($data);
            if (!empty($data)) {
                Stock::updateOrCreate(
                    [
                        'accessories_id' => $products->id
                    ],
                    [
                        'out_qty' => $request->qty + $inQtyOutQtyProduct->out_qty,
                        'available_qty' => $request->out_qty,
                    ]
                );
            }
            Toastr::success('ProductTrait added to cart', 'success');
            return redirect()->back();
        }else {
            return redirect()->back()->with('message', 'Available Qty is "'.$request->av_qty.'" ');
        }

    }

    public function accessoriesAddToWiseList($id)
    {
        $product = Accessories::findOrfail($id);

        $data = [];
        $data['product_id']=$id;
        $data['name']=$product->name;
        $data['qty']=1;
        $data['price']=$product->price;
        $data['sub_total']=$product->price;
        \DB::table('carts')->insert($data);
        return response()->json(['success'=>'Wise List added']);
    }

    public function wiseListProducts($id)
    {
        $product = Product::where('status', 1)->findOrfail($id);

        $data = [];
        $data['product_id']=$id;
        $data['name']=$product->name;
        $data['qty']=1;
        $data['price']=$product->sale_price;
        $data['sub_total']=$product->sale_price;
        \DB::table('carts')->insert($data);
        return response()->json(['success'=>'Wise List added']);
    }

    public function deleteCartProduct($id)
    {
        $deleteCartProduct = \App\Model\Cart::find($id);
        $deleteCartProduct->delete();
        return redirect()->back();
    }

    public function productDelete($id)
    {
        Cart::remove($id);
        Toastr::success('Cart product has been removed :)', 'Success');
        return redirect()->back();
    }
}
