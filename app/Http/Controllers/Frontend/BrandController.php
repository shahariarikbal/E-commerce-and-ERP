<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
use App\Model\Accessories;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function carBrand($id, Request $r)
    {
        $webBrands        = WebBrand::with('product')->get();
        $webManufacturers = WebManufacture::with('product')->get();
        $webCategories    = WebCategory::with('category')->get();
        $cartProducts     = \Cart::content();
        $countries        = Country::all();

        $brandProduct = ProductBrand::where('brand_id', $id)->get();

        $productCategory = ProductCategory::with('category', 'product')->whereIn('product_id', $brandProduct->pluck('product_id'))->get()->groupBy('category_id');
        $productSubCategory = ProductSubcategory::with('subcategory', 'product')->whereIn('product_id', $brandProduct->pluck('product_id'))->get()->groupBy('subcategory_id');
        // dd($productSubCategory);
        $productManufacture = ProductManufacture::with('manufacture', 'product')->whereIn('product_id', $brandProduct->pluck('product_id'))->get()->groupBy('manufacture_id');
        // dd($id);

        $productBrands = ProductBrand::with('product')->where('brand_id', $id)->get();

        $products = array();

        foreach ($productBrands as $pb) {
            array_push($products, $pb->product);
        }

        $allBrands = WebBrand::with('product')->withCount('product')->where('id', $id)->get();
        // dd($allBrands);

        $data = [
            'name'          => WebBrand::find($id)->name,
            'categories'    => $productCategory,
            'minPrice'      => Product::min('sale_price'),
            'maxPrice'      => Product::max('sale_price'),
            'subCategories' => $productSubCategory,
            'manufactures'  => $productManufacture,
            'conditions'    => Condition::with('products')->get(),
            'brands'        => $allBrands,
            'products'      => $products
        ];

        return view('version-1.fontend.brand.brand', compact(
            'data', 'webBrands', 'webManufacturers',
            'webCategories', 'cartProducts', 'countries', 'id', 'productCategory'
        ));
    }

    public function carBrandCurrency($id, $slug)
    {
        $webBrands        = WebBrand::with('product')->get();
        $webManufacturers = WebManufacture::with('product')->get();
        $webCategories    = WebCategory::with('category')->get();
        $cartProducts     = \Cart::content();
        $countries        = Country::all();

        $data = [
            'name'          => WebBrand::find($id)->name,
            'categories'    => Category::with('product')->get(),
            'minPrice'      => Product::min('sale_price'),
            'maxPrice'      => Product::max('sale_price'),
            'subCategories' => SubCategory::with('product')->get(),
            'manufactures'  => WebManufacture::with('product')->get(),
            'conditions'    => Condition::with('products')->get(),
            'brands'        => WebBrand::with('product')->get()
        ];

        return view('version-1.fontend.brand.brand', compact(
            'data', 'webBrands', 'webManufacturers',
            'webCategories', 'cartProducts', 'countries', 'id', 'slug'
        ));
    }

    public function sliderPrice($brandId, Request $request)
    {
        $categories = $request->category;
        $subCategories = $request->subCategory;
        $manufacturers = $request->manufacturer;
        $conditions = $request->condition;
        $brands = $request->brand;
        $min = $request->minimum;
        $max = $request->maximum;
        $products = array();
        $productBrands = ProductBrand::with('product')->where('brand_id', $brandId)->get();
        $msg = 0;

        // dd($max);

        // return $productBrands[1]->product->sale_price;
        foreach ($productBrands as $pb) {
            
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

                    // if ($categories != NULL) {
                    //     $all_product_cats = array();
                    //     foreach ($current_product->productCategory as $pc) {
                    //         array_push($all_product_cats, $pc->category_id);
                    //     }                        
                    //     if(empty(array_diff( $categories ,$all_product_cats ))){
                    //         $cflag = 1;
                    //     }
                    // }

                    
                    if ($categories != NULL) {
                        foreach ($current_product->productCategory as $pc) {
                            if(in_array($pc->category_id, $categories)){
                                $cflag = 1;
                                break;
                            }
                        }                       
                    }

                    // dd($categories);



                    // if ($subCategories != NULL) {
                    //     $all_product_subCats = array();
                    //     foreach ($current_product->productSubcategory as $ps) {
                    //         array_push($all_product_subCats, $ps->subcategory_id);
                    //     }                         
                    //     if( empty(array_diff( $subCategories ,$all_product_subCats )) ){
                    //         $sflag = 1;
                    //     }                       
                    // }

                    // subcategory filtering with adding products
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

        // get all product ids available into an array
        $I = array();
        foreach ($products as $P) {
            array_push($I, $P->id);
        }

        // get all sub categories available
        $allSubs = Subcategory::orderBy('priority', 'asc')->get('id');

        // sorting with sub cats & getting unique ids
        $productIds = array();
        foreach ($allSubs as $sub) {
            foreach ($products as $prod) {
                foreach ($prod->productSubcategory as $prodSub) {
                    if( $prodSub->subcategory_id == $sub->id && !in_array($prod->id, $productIds) ){
                        array_push( $productIds, $prod->id );
                    }
                }
            }
        }

        // adding who dont have subcat ids
        foreach ($products as $prod) {
            if (!in_array($prod->id, $productIds)) {
                array_push( $productIds, $prod->id );
            }
        }

        // refreshing products final array & adding object datas
        $products = array();
        foreach ($productIds as $p_id) {
            $final_product = Product::find($p_id);
            if (!is_null($final_product)) {
                
                array_push($products, $final_product);
            }
        }

        // dd($products);


        // for each sub cat id - compare all available product's sub cat id, if available .. insert product id
        // if product id already inserted , dont insert
        // manage without sub products



        if(count($products) == 0){
            $msg = "No products found";
        }

        // return $products->with('productCategory');       

        return response()->json([
            'products'    => $products,
            'msg'          => $msg
        ], 200);

    }

    public function sliderPrice1($brandId, Request $request)
    {
        $categories = $request->category;
        // $productCat = [];
        // $productSubCat = [];
        // $productManufacture = [];
        // $productBrand = [];

        // $catArray = explode(',', $request->category);
        // if (isset($request->category)){
        //     $productCat = ProductCategory::whereIn('category_id', $catArray)->pluck('product_id');
        // }
        // $categoryProducts = Product::whereIn('id', $productCat)->get()->toArray();


        // $subCatArray = explode(',', $request->sub_category);
        // if (isset($request->sub_category)){
        //     $productSubCat = ProductSubcategory::whereIn('subcategory_id', $subCatArray)->pluck('product_id');
        // }
        // $subCategoryProducts = Product::whereIn('id', $productSubCat)->get()->toArray();

        // $manufactureArray = explode(',', $request->manufacture);
        // if (isset($request->manufacture)){
        //     $productManufacture = ProductManufacture::whereIn('manufacture_id', $manufactureArray)->pluck('product_id');
        // }
        // $manufactureProducts = Product::whereIn('id', $productManufacture)->get()->toArray();

        // $brandArray = explode(',', $request->company);
        // if (isset($request->company)){
        //     $productBrand = ProductBrand::whereIn('brand_id', $brandArray)->pluck('product_id');
        // }
        // $brandWishProducts = Product::whereIn('id', $productBrand)->get()->toArray();



        $productBrands = ProductBrand::with('product')->where('brand_id', $brandId)->get();

        // $query = Product::whereIn('id', $productId)->get();

        // $query = $query->where('sale_price', '>=', $min)->where('sale_price', '<=', $max);

        // $brandProducts = $query->get()->toArray();

        // $products = array_merge($productBrands, $categoryProducts, $subCategoryProducts, $manufactureProducts, $brandWishProducts);

        return response()->json([
            'productBrands'    => $productBrands
        ], 200);

    }
}
