<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Product;
use App\Model\Subcategory;
use App\Model\WebBrand;
use App\Model\WebCategory;
use App\Model\WebManufacture;
use App\Model\WebProduct;
use App\Model\Condition;
use App\Model\Country;
use Illuminate\Http\Request;

class AttensionController extends Controller
{
    public function attensionProducts()
    {
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webUpcomingProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webProducts = Product::where('status', 1)->get();
        $cartProducts = \Cart::content();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.attention.attension', compact('countries','conditions','webLatestProducts','subcategoriesCount','maxPrice','minPrice','cartProducts','webCategories','webBrands','webManufacturers','webProducts','webCategory','webUpcomingProducts'));
    }

    public function freeShipping()
    {
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webUpcomingProducts = Product::where('status', 1)->where('product_type', 'Free Shipping')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webProducts = Product::where('status', 1)->get();
        $cartProducts = \Cart::content();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.shipping.shipping', compact('countries','conditions','webLatestProducts','subcategoriesCount','maxPrice','minPrice','cartProducts','webCategories','webBrands','webManufacturers','webProducts','webCategory','webUpcomingProducts'));
    }
}
