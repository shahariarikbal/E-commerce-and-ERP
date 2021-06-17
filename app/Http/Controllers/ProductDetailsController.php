<?php

namespace App\Http\Controllers;

use App\Model\Accessories;
use App\Model\Country;
use App\Model\CountryProduct;
use App\Model\Product;
use App\Model\Stock;
use App\Model\WebBrand;
use App\Model\WebCategory;
use App\Model\WebManufacture;
use App\Model\WebProduct;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function productDetails($id)
    {
        $webProductDetails = Product::where('status', 1)->with('feature','accessoriesProduct','productCategory', 'productBrands', 'productManufacture', 'country', 'productSubcategory', 'stocks', 'condition', 'countryProduct')->where('id', $id)->first();
        $webProductStock = Stock::where('product_id', $id)->first();
        $stock = $webProductStock ? $webProductStock->available_qty : 0;
        $related= Product::where('status', 1)->where('cat_id', '=', $webProductDetails->category ? $webProductDetails->category->id: '')
            ->where('id', '!=', $webProductDetails->id)
            ->get();
        $webCategories = WebCategory::all();
        $webBrands = WebBrand::all();
        $webProducts = Product::where('status', 1)->get();
        $webManufacturers = WebManufacture::all();
        $cartProducts = \Cart::content();
        $countries = Country::all();
        return view('version-1.fontend.product.upcoming-details', compact('webProductStock','stock','countries','related','cartProducts','webManufacturers','webProductDetails', 'webCategories', 'webBrands', 'webProducts'));
    }

    public function accessoriesProductDetails($id)
    {
        $accessoriesProductDetails = Accessories::with('accessoriesProduct','category', 'brand', 'country', 'subcategory', 'stocks', 'condition', 'countryProduct')->where('id', $id)->first();
        $webProductStock = Stock::where('accessories_id', $id)->first();
        $stock = $webProductStock ? $webProductStock->available_qty : 0;
        $relatedAccessoriesProduct = Accessories::where('cat_id', '=', $accessoriesProductDetails->category ? $accessoriesProductDetails->category->id : '')
            ->where('id', '!=', $accessoriesProductDetails->id)
            ->get();
        $webCategories = WebCategory::all();
        $webBrands = WebBrand::all();
        $webProducts = Product::where('status', 1)->get();
        $webManufacturers = WebManufacture::all();
        $cartProducts = \Cart::content();
        $countries = Country::all();
        return view('version-1.fontend.product.accessories-details', compact(
            'stock',
            'webProductStock',
            'countries',
            'relatedAccessoriesProduct',
            'cartProducts',
            'webProductStock',
            'webManufacturers',
            'accessoriesProductDetails',
            'webCategories',
            'webBrands',
            'webProducts'));
    }
}
