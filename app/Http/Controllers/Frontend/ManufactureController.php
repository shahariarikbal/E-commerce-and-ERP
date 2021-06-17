<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Accessories;
use App\Model\Cart;
use App\Model\Category;
use App\Model\Condition;
use App\Model\Country;
use App\Model\Product;
use App\Model\ProductBrand;
use App\Model\ProductCategory;
use App\Model\ProductManufacture;
use App\Model\ProductSubcategory;
use App\Model\Subcategory;
use App\Model\WebBrand;
use App\Model\WebCategory;
use App\Model\WebManufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function carManufacture($id)
    {
        $webBrands        = WebBrand::with('product')->get();
        $webManufacturers = WebManufacture::with('product')->get();
        $webCategories    = WebCategory::with('category')->get();
        $cartProducts     = \Cart::content();
        $countries        = Country::all();

        $manufactureProduct = ProductManufacture::where('manufacture_id', $id)->get();

        $productCategory = ProductCategory::with('category', 'product')->whereIn('product_id', $manufactureProduct->pluck('product_id'))->get()->groupBy('category_id');
        $productSubCategory = ProductSubcategory::with('subcategory', 'product')->whereIn('product_id', $manufactureProduct->pluck('product_id'))->get()->groupBy('subcategory_id');
        $productBrand = ProductBrand::with('brand', 'product')->whereIn('product_id', $manufactureProduct->pluck('product_id'))->get()->groupBy('brand_id');

        // dd($productBrand);

        $data = [
            'name'          => WebManufacture::find($id)->name,
            'categories'    => $productCategory,
            'minPrice'      => Product::min('sale_price'),
            'maxPrice'      => Product::max('sale_price'),
            'subCategories' => $productSubCategory,
            'manufactures'  => $manufactureProduct,
            'conditions'    => Condition::with('products')->get(),
            'brands'        => $productBrand
        ];

        return view('version-1.fontend.manufacture.manufacture', compact(
            'data', 'webBrands', 'webManufacturers',
            'webCategories', 'cartProducts', 'countries', 'id'
        ));
    }



    public function sliderPrice($manufactureId, Request $request)
    {
        $categories = $request->category;
        $subCategories = $request->subCategory;
        $manufacturers = $request->manufacturer;
        $conditions = $request->condition;
        $brands = $request->brand;
        $min = $request->minimum;
        $max = $request->maximum;
        $products = array();
        $productManufacturers = ProductManufacture::with('product')->where('manufacture_id', $manufactureId)->get();

        $msg = 0;

        // dd($max);

        // return $productManufacturers[1]->product->sale_price;
        foreach ($productManufacturers as $pb) {
            
            $current_product = $pb->product;

            // dd($current_product->sale_price);
            // price limit check
            if ( $current_product->sale_price >= $min && $current_product->sale_price <= $max && $current_product->status == 1 ) {
                $cflag =  0;
                $sflag =  0;
                $mflag =  0;
                $cnflag =  0;
                $bflag =  0;

                // category check
                if( $categories != NULL || $subCategories != NULL || $manufacturers != NULL || $conditions != NULL || $brands != NULL ){


 
                    if ($categories != NULL) {
                        foreach ($current_product->productCategory as $pc) {
                            if(in_array($pc->category_id, $categories)){
                                $cflag = 1;
                                break;
                            }
                        }                       
                    }


                    if ($subCategories != NULL) {
                        foreach ($current_product->productSubcategory as $ps) {
                            if(in_array($ps->subcategory_id, $subCategories)){
                                $sflag = 1;
                                break;
                            }
                        }                       
                    }



                    if ($manufacturers != NULL) {
                        foreach ($current_product->productManufacture as $pm) {
                            if(in_array($pm->manufacture_id, $manufacturers)){
                                $mflag = 1;
                                break;
                            }
                        }                        
                    }



                    if ( $conditions != NULL && isset($current_product->condition) ) {                        
                        if(in_array($current_product->condition->id, $conditions)){
                            $cnflag = 1;
                            // break;
                        }                       
                    }



                    if ($brands != NULL) {
                        foreach ($current_product->productBrands as $pb) {
                            if(in_array($pb->brand_id, $brands)){
                                $bflag = 1;
                                break;
                            }
                        }                        
                    }


                    if($categories != NULL && $subCategories != NULL && $manufacturers != NULL && $conditions != NULL && $brands != NULL){
                        if($cflag == 1 && $sflag == 1 && $mflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL && $manufacturers != NULL && $conditions != NULL){
                        if($cflag == 1 && $sflag == 1 && $mflag == 1 && $cnflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($subCategories != NULL && $manufacturers != NULL && $conditions != NULL && $brands != NULL){
                        if($sflag == 1 && $mflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL && $manufacturers != NULL && $brands != NULL){
                        if($cflag == 1 && $sflag == 1 && $mflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL && $conditions != NULL && $brands != NULL){
                        if($cflag == 1 && $sflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $manufacturers != NULL && $conditions != NULL && $brands != NULL){
                        if($cflag == 1 && $mflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL && $manufacturers != NULL){
                        if($cflag == 1 && $sflag == 1 && $mflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $manufacturers != NULL && $conditions != NULL){
                        if($cflag == 1 && $mflag == 1 && $cnflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $manufacturers != NULL && $brands != NULL){
                        if($cflag == 1 && $mflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif( $subCategories != NULL && $manufacturers != NULL && $conditions != NULL){
                        if($sflag == 1 && $mflag == 1 && $cnflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif( $subCategories != NULL && $manufacturers != NULL && $brands != NULL){
                        if($sflag == 1 && $mflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($subCategories != NULL && $conditions != NULL && $brands != NULL){
                        if($sflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($manufacturers != NULL && $conditions != NULL && $brands != NULL){
                        if($mflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL && $conditions != NULL){
                        if($cflag == 1 && $sflag == 1 && $cnflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL && $brands != NULL){
                        if($cflag == 1 && $sflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $conditions != NULL && $brands != NULL){
                        if($cflag == 1 && $cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $subCategories != NULL){
                        if($cflag == 1 && $sflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $manufacturers != NULL){
                        if($cflag == 1 && $mflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $conditions != NULL){
                        if($cflag == 1 && $cnflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL && $brands != NULL){
                        if($cflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($subCategories != NULL && $manufacturers != NULL){
                        if($sflag == 1 && $mflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($subCategories != NULL && $conditions != NULL){
                        if($sflag == 1 && $cnflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($subCategories != NULL && $brands != NULL){
                        if($sflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($manufacturers != NULL && $conditions != NULL){
                        if($mflag == 1 && $cnflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($manufacturers != NULL && $brands != NULL){
                        if($mflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($conditions != NULL && $brands != NULL){
                        if($cnflag == 1 && $bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }elseif($categories != NULL){
                        if($cflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($subCategories != NULL){
                        if($sflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($manufacturers != NULL){
                        if($mflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($conditions != NULL){
                        if($cnflag == 1){
                            array_push($products, $current_product);      
                        } 
                    }elseif($brands != NULL){
                        if($bflag == 1 ){
                            array_push($products, $current_product);      
                        } 
                    }


                }else{  
                   array_push($products, $current_product);                   
                }
                // category check end


            }
            // price limit check end
        }

        if(count($products) == 0){
            $msg = "No products found";
        }

        // return $products->with('productCategory');       

        return response()->json([
            'products'    => $products,
            'msg'          => $msg
        ], 200);

    }

    public function sliderPrice2($manufactureId, $min, $max, Request $request)
    {
        $productCat = [];
        $productSubCat = [];
        $productManufacture = [];
        $productBrand = [];

        $catArray = explode(',', $request->category);
        if (isset($request->category)){
            $productCat = ProductCategory::whereIn('category_id', $catArray)->pluck('product_id');
        }
        $categoryProducts = Product::whereIn('id', $productCat)->get()->toArray();


        $subCatArray = explode(',', $request->sub_category);
        if (isset($request->sub_category)){
            $productSubCat = ProductSubcategory::whereIn('subcategory_id', $subCatArray)->pluck('product_id');
        }
        $subCategoryProducts = Product::whereIn('id', $productSubCat)->get()->toArray();

        $brandArray = explode(',', $request->company);
        if (isset($request->company)){
            $productBrand = ProductBrand::whereIn('brand_id', $brandArray)->pluck('product_id');
        }
        $brandWishProducts = Product::whereIn('id', $productBrand)->get()->toArray();

        $manufactureArray = explode(',', $request->manufacture);
        if (isset($request->manufacture)){
            $productManufacture = ProductManufacture::whereIn('manufacture_id', $manufactureArray)->pluck('product_id');
        }
        $manufactureProducts = Product::whereIn('id', $productManufacture)->get()->toArray();

        $productId = ProductManufacture::where('manufacture_id', $manufactureId)->pluck('product_id');
        $query = Product::whereIn('id', $productId);
        $query = $query->where('sale_price', '>=', $min)->where('sale_price', '<=', $max);

        $manufactureAllProducts = $query->get()->toArray();
        //dd($manufactureAllProducts);
        $products = array_merge($manufactureAllProducts, $categoryProducts, $subCategoryProducts, $manufactureProducts, $brandWishProducts);

        return response()->json([
            'products'    => $products
        ], 200);

    }
}
