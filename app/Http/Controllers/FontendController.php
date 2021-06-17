<?php

namespace App\Http\Controllers;

use App\Model\About;
use App\Model\Accessories;
use App\Model\Cart;
use App\Model\Category;
use App\Model\Contact;
use App\Model\Country;
use App\Model\CountryProduct;
use App\Model\Currency;
use App\Model\Message;
use App\Model\Product;
use App\Model\Subcategory;
use App\Model\Team;
use App\Model\Banner;
use App\Model\Testimonial;
use App\Model\Video;
use App\Model\WebBrand;
use App\Model\WebCategory;
use App\Model\WebManufacture;
use App\Model\WebProduct;
use App\Model\Condition;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FontendController extends Controller
{
    public function form(Request $r){
        return $r->all();
    }
    public function index(Request $r)
    {
            $webCategories = WebCategory::all();
            $sliders = Banner::where('type', 'slider')->orderBy('created_at', 'DESC')->get();
            $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
            $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
            $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
            $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
            $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
            $webUpcomingProducts = Product::where('status', 1)->where('product_type', 'Upcoming')->orderBy('id', 'DESC')->get();
            $webDiscountProducts = Product::where('status', 1)->where('product_type', 'Discount')->orderBy('id', 'DESC')->get();
            $webOurProducts = Product::where('status', 1)->where('product_type', 'Our Product')->orderBy('id', 'DESC')->get();
            $webBrands = WebBrand::all();
            $webProducts = Product::where('status', 1)->get();
            $webManufacturers = WebManufacture::all();
            $totalProduct = Cart::all()->count();
            $totalPriceSum = \DB::table('carts')->sum('sub_total');
            $cartProducts = \Cart::content();
            $abouts = About::first();
            $countries = Country::all();
            $b2 = Banner::where('type', 'b2')->orderBy('created_at', 'DESC')->first();
            $b3 = Banner::where('type', 'b3')->orderBy('created_at', 'DESC')->first();
            $b4 = Banner::where('type', 'b4')->orderBy('created_at', 'DESC')->first();
            $b5 = Banner::where('type', 'b5')->orderBy('created_at', 'DESC')->first();
            $b6 = Banner::where('type', 'b6')->orderBy('created_at', 'DESC')->first();
            $b7 = Banner::where('type', 'b7')->orderBy('created_at', 'DESC')->first();
            $b8 = Banner::where('type', 'b8')->orderBy('created_at', 'DESC')->first();
            $all_b8 = Banner::where('type', 'b8')->orderBy('created_at', 'asc')->get();
            // dd(isset($all_b8[2]));
            $b9 = Banner::where('type', 'b9')->orderBy('created_at', 'DESC')->first();
            $b10 = Banner::where('type', 'b10')->orderBy('created_at', 'DESC')->first();
            $b11 = Banner::where('type', 'b11')->orderBy('created_at', 'DESC')->first();
            $shopByBrand = Banner::where('type', 'shop by brand')->orderBy('created_at', 'DESC')->get();


        return view('version-1.fontend.index', compact(
            'sliders','countries', 'abouts','webOurProducts',
            'webProducts','webDiscountProducts','webUpcomingProducts',
            'totalPriceSum','cartProducts','totalProduct','webAttentionProducts',
            'webLatestProducts','webManufacturers','webBrands','webCategories',
            'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts',
            'webBrands', 'webManufacturers', 'b2', 'b3','b4', 'b5', 'b6', 'b7', 'b8', 'b9','b10','b11','shopByBrand', 'all_b8'));
    }

    public function currencyChange($slug)
    {
        $webCategories = WebCategory::all();
        $sliders = Banner::where('type', 'slider')->orderBy('created_at', 'DESC')->get();
        $webFeatureProducts = Product::where('product_type', 'Feature')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('product_type', 'Best Seller')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('product_type', 'Top Rated')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('product_type', 'Attention')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('product_type', 'Latest')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webUpcomingProducts = Product::where('product_type', 'Upcoming')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webDiscountProducts = Product::where('product_type', 'Discount')->where('status', 1)->orderBy('id', 'DESC')->get();
        $webOurProducts = Product::where('product_type', 'Our Product')->where('status', 1)->orderBy('id', 'DESC')->get();
        // dd($webOurProducts);
        $webBrands = WebBrand::all();
        $webProducts = Product::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $cartProducts = \Cart::content();
        $abouts = About::first();
        $countries = Country::all();
        $b2 = Banner::where('type', 'b2')->orderBy('created_at', 'DESC')->first();
        $b3 = Banner::where('type', 'b3')->orderBy('created_at', 'DESC')->first();
        $b4 = Banner::where('type', 'b4')->orderBy('created_at', 'DESC')->first();
        $b5 = Banner::where('type', 'b5')->orderBy('created_at', 'DESC')->first();
        $b6 = Banner::where('type', 'b6')->orderBy('created_at', 'DESC')->first();
        $b7 = Banner::where('type', 'b7')->orderBy('created_at', 'DESC')->first();
        $b8 = Banner::where('type', 'b8')->orderBy('created_at', 'DESC')->first();
        $b9 = Banner::where('type', 'b9')->orderBy('created_at', 'DESC')->first();
        $b10 = Banner::where('type', 'b10')->orderBy('created_at', 'DESC')->first();
        $b11 = Banner::where('type', 'b11')->orderBy('created_at', 'DESC')->first();
        $shopByBrand = Banner::where('type', 'shop by brand')->orderBy('created_at', 'DESC')->get();


        $currency = Currency::where('slug', $slug)->first();
        //dd($currency);
        return view('version-1.fontend.index', compact(
            'sliders', 'countries', 'abouts', 'webOurProducts',
            'webProducts', 'webDiscountProducts', 'webUpcomingProducts',
            'totalPriceSum', 'cartProducts', 'totalProduct', 'webAttentionProducts',
            'webLatestProducts', 'webManufacturers', 'webBrands', 'webCategories',
            'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts',
            'webBrands', 'webManufacturers', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b10', 'b11', 'shopByBrand', 'currency'));
    }

    public function getModalData(Request $get)
    {
        $id = $get->id;

        $product =  Product::with('bulkproducts','brand', 'countryProduct','feature', 'stocks')->where('status', 1)->find($id);


        return response()->json($product, 200);
    }

    public function searching(Request $request)
    {
        // dd($request->all());
        //$data = [];
        if($request->ajax()) {
            $search = $request->get('search');
            $searchData = Product::with('feature')
                    ->where('name', 'LIKE', $search.'%')
                    ->orWhere('sku', 'LIKE', $search.'%')
                    ->orWhere('product_model', 'LIKE', $search.'%')
                    ->orWhereHas('feature', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    })
                    ->get();

            $data = $searchData->where('status', 1 );


            if (count($data)>0) {
                $output = '<div class="suggestions__group-content" id="myTable">';

                foreach ($data as $row) {

                    $output .= '<a class="suggestions__item suggestions__product" href="' . '/upcoming/product/details/' . $row->id . '">
                                    <div class="suggestions__product-image"><img src="' . '/product/' . $row->image . '" alt="" style="width: 70px; height: 70px;"></div>
                                    <div class="suggestions__product-info"><div class="suggestions__product-name" style="text-transform: capitalize">' . $row->name . '</div></div>
                                    <div class="suggestions__product-price">$' . $row->sale_price . '</div>
                                </a>';
                }

                $output .= '</div>';
                return $output;
            }

        }

    }

    public function searchingForMobile(Request $request)
    {
        // dd($request->all());
        //$data = [];
        if($request->ajax()) {
            $search = $request->get('search');
            $searchData = Product::where('name', 'LIKE', $search.'%')
                    ->orWhere('sku', 'LIKE', $search.'%')
                    ->orWhere('product_model', 'LIKE', $search.'%')
                    ->get();

            $data = $searchData->where('status', 1 );

            if (count($data)>0) {
                $output = '<div class="suggestions__group-content" id="myTable">';

                foreach ($data as $row){

                    $output .= '<a class="suggestions__item suggestions__product" href="'.'/upcoming/product/details/'.$row->id.'">
                                    <div class="suggestions__product-image"><img src="'.'/product/'.$row->image.'" alt="" style="width: 70px; height: 70px;"></div>
                                    <div class="suggestions__product-info"><div class="suggestions__product-name" style="text-transform: capitalize">'.$row->name.'</div></div>
                                    <div class="suggestions__product-price">$'.$row->sale_price.'</div>
                                </a>';
                }

                $output .= '</div>';
                return $output;
            }else {
                $accessories = Accessories::where('name', 'LIKE', $search.'%')
                    ->orWhere('sku', 'LIKE', $search.'%')
                    ->orWhere('model', 'LIKE', $search.'%')
                    ->get();

                $accessoriesHtml = '';

                if (count($accessories)>0) {
                    $accessoriesHtml = '<div class="suggestions__group-content" id="myTable">';

                    foreach ($accessories as $row){

                        $accessoriesHtml .= '<a class="suggestions__item suggestions__product" href="'.'/accessories/product/details/'.$row->id.'">
                                    <div class="suggestions__product-image"><img src="'.$row->image.'" alt="" style="width: 70px; height: 70px;"></div>
                                    <div class="suggestions__product-info"><div class="suggestions__product-name" style="text-transform: capitalize">'.$row->name.'</div></div>
                                    <div class="suggestions__product-price">$'.$row->price.'</div>
                                </a>';
                    }

                    $accessoriesHtml .= '</div>';
                    return $accessoriesHtml;
                }
            }

        }

    }


    public function searchPage(Request $r){
        
        // return $r->all();
        $search = $r->search;
        $searchData = Product::where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('product_model', 'LIKE', '%'.$search.'%')
                ->orWhere('sku', 'LIKE', '%'.$search.'%')
                ->orWhere('short_description', 'LIKE', '%'.$search.'%')
                ->orWhere('long_description', 'LIKE', '%'.$search.'%')
                ->orWhere('key_feature', 'LIKE', '%'.$search.'%')
                ->orWhere('specification', 'LIKE', '%'.$search.'%')
                ->orWhere('product_type', 'LIKE', '%'.$search.'%')
                ->with('productCats', 'productSubs', 'condition', 'productManus', 'productBrs')
                ->get();

        $searchProducts = array();

        $categories = collect();
        $subcategories = collect();
        $conditions = collect();
        $manufacturers = collect();
        $brands = collect();

        foreach ($searchData as $sd) {

            if($sd->status==1){

                // category collect
                if ($sd->productCats->count() > 0) {
                    foreach ($sd->productCats as $cat) {
                        if( $categories->has($cat->id) == false && $cat->status == "active" ){
                            $categories->put($cat->id , $cat->name); 
                        }                   
                    }
                }

                // subcategory collect
                if ($sd->productSubs->count() > 0) {
                    foreach ($sd->productSubs as $subcat) {
                        if( $subcategories->has($subcat->id) == false && $subcat->status == "active" ){
                            $subcategories->put($subcat->id , $subcat->name); 
                        }                   
                    }
                }

                // condition collect

                if( isset($sd->condition) && $conditions->has($sd->condition->id) == false ){
                    $conditions->put($sd->condition->id , $sd->condition->name); 
                }


                // manufacturer collect
                if ($sd->productManus->count() > 0) {
                    foreach ($sd->productManus as $manu) {
                        if( $manufacturers->has($manu->id) == false && $manu->status == 1 ){
                            $manufacturers->put($manu->id , $manu->name); 
                        }                   
                    }
                }


                // brand collect
                if ($sd->productBrs->count() > 0) {
                    foreach ($sd->productBrs as $br) {
                        if( $brands->has($br->id) == false && $br->status == 1 ){
                            $brands->put($br->id , $br->name); 
                        }                   
                    }
                }

                array_push($searchProducts, $sd);
            }
        }

        // $search_collection = collect($searchProducts);


        // $search_products = collect($products);
        // // dd($search_products);

        // $page = 1;
        // $perPage = 10;
        // $pagination = new \Illuminate\Pagination\LengthAwarePaginator(
        //     $search_products->forPage($page, $perPage), 
        //     $search_products->count(), 
        //     $perPage, 
        //     $page
        // );

        // return $pagination->render();
        // dd($pagination->links());



        // $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webProducts = WebProduct::all();
        $cartProducts = \Cart::content();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        // $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $countries = Country::all();

        return view('version-1.fontend.search.search', compact('countries','conditions','webLatestProducts','subcategories','maxPrice','minPrice','cartProducts','webCategories','webBrands', 'brands','webManufacturers' ,'manufacturers','webProducts','categories','searchProducts', 'search'));
    }




    public function sliderPrice(Request $request)
    {
        $search = $request->search;
        $categories = $request->category;
        $subCategories = $request->subCategory;
        $manufacturers = $request->manufacturer;
        $conditions = $request->condition;
        $brands = $request->brand;
        $min = $request->minimum;
        $max = $request->maximum;
        $products = array();

        $searchProducts = Product::where('status', 1)
                ->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('product_model', 'LIKE', '%'.$search.'%')
                ->orWhere('sku', 'LIKE', '%'.$search.'%')
                ->orWhere('short_description', 'LIKE', '%'.$search.'%')
                ->orWhere('long_description', 'LIKE', '%'.$search.'%')
                ->orWhere('key_feature', 'LIKE', '%'.$search.'%')
                ->orWhere('specification', 'LIKE', '%'.$search.'%')
                ->orWhere('product_type', 'LIKE', '%'.$search.'%')
                ->get();
        // dd($searchProducts);

        $msg = 0;

        // dd($max);

        // return $searchProducts[1]->product->sale_price;
        foreach ($searchProducts as $p) {

            $current_product = $p;

                // dd($p);
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




        // $search_products = collect($products);
        // dd($search_products);

        // $page = 1;
        // $perPage = 10;
        // $pagination = new \Illuminate\Pagination\LengthAwarePaginator(
        //     $search_products->forPage($page, $perPage), 
        //     $search_products->count(), 
        //     $perPage, 
        //     $page
        // );

        // return $pagination->render();
        // dd($pagination->links());






        if(count($products) == 0){
            $msg = "No products found";
        }

        // return $products->with('productCategory');

        return response()->json([
            'products' => $products,
            'msg'      => $msg
        ], 200);

    }


    public function superDeals()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webSuperDealProducts = Product::where('status', 1)->where('product_type', 'Super Deal')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webCategory = Category::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.super.super', compact('countries','conditions','cartProducts','webLatestProducts','subcategoriesCount','minPrice','maxPrice','webCategory','webCategories','webProducts', 'webSuperDealProducts', 'webBrands', 'webManufacturers'));
    }

    public function offers()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webOfferProducts = Product::where('status', 1)->where('product_type', 'Offers')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webCategory = Category::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.offer.offer', compact('countries','conditions', 'cartProducts','webLatestProducts','subcategoriesCount','minPrice','maxPrice','webCategory','webCategories','webProducts', 'webOfferProducts', 'webBrands', 'webManufacturers'));
    }

    public function bestSeller()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webCategory = Category::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.seller.seller', compact('countries','conditions','cartProducts','webLatestProducts','subcategoriesCount','minPrice','maxPrice','webCategory','webCategories','webProducts', 'webBestSellerProducts', 'webBrands', 'webManufacturers'));
    }

    public function newArrival()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webNewArrivalProducts = Product::where('status', 1)->where('product_type', 'New Arrival')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webCategory = Category::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.arrival.arrival', compact('countries','conditions','cartProducts','webLatestProducts','subcategoriesCount','minPrice','maxPrice','webCategory','webCategories','webProducts', 'webNewArrivalProducts', 'webBrands', 'webManufacturers'));
    }

// ccc
    public function searchAllPage(Request $request)
    {
        // return $request;
        $categories = $request->category;
        $subCategories = $request->subCategory;
        $manufacturers = $request->manufacturer;
        $conditions = $request->condition;
        $brands = $request->brand;
        $min = $request->minimum;
        $max = $request->maximum;
        $products = array();
        $msg = 0;

        if($request->page=="new_arrival"){
            $searchProducts = Product::where('status', 1)->where('product_type', 'New Arrival')->orderBy('id', 'DESC')->get();
            // dd($searchProducts);
        }elseif ($request->page=="best_seller") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="offer") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Offers')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="super_deals") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Super Deal')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="free_shipping") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Free Shipping')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="top_rated") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="attension") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="upcoming") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Upcoming')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="feature") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="our") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Our Product')->orderBy('id', 'DESC')->get();
        }elseif ($request->page=="discount") {
            $searchProducts = Product::where('status', 1)->where('product_type', 'Discount')->orderBy('id', 'DESC')->get();
        }
        // dd($searchProducts);


        // dd($max);

        // return $searchProducts[1]->product->sale_price;
        foreach ($searchProducts as $p) {

            $current_product = $p;

                // dd($p);
            // dd($current_product->sale_price);
            // price limit check
            if ( $current_product->sale_price >= $min && $current_product->sale_price <= $max ) {
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

                    // dd($products);
        // return $products->with('productCategory');

        return response()->json([
            'products'    => $products,
            'msg'          => $msg
        ], 200);

    }

    public function aboutUs()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $abouts = About::first();
        $teams = Team::get();
        $testimonials = Testimonial::get();
        $countries = Country::all();
        return view('version-1.fontend.about.about', compact('countries','testimonials','teams','abouts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function contactUs()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $contacts = Contact::first();
        $countries = Country::all();
        return view('version-1.fontend.contact.contact', compact('countries','contacts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function videos()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $videos = Video::orderBy('created_at', 'DESC')->get();
        $countries = Country::all();
        return view('version-1.fontend.videos.videos', compact('countries','videos','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function freeShipping()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = Cart::take(3)->get();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.shipping.shipping', compact('countries','conditions','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function software()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webSoftwareProducts = Product::where('status', 1)->where('product_type', 'Software')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $countries = Country::all();
        return view('version-1.fontend.software.software', compact('countries','webSoftwareProducts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function searchProducts()
    {
        return $searchProducts = Product::where('status', 1)->get();
    }

    public function showAbout()
    {
        return About::first();
    }

    public function professionalTeams()
    {
        return Team::take(5)->get();
    }

    public function showTestimonial()
    {
        return Testimonial::all();
    }

    public function showAddress()
    {
        return Contact::first();
    }

    public function upcomingProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Upcoming')->get();
    }

    public function topProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Top Rated')->get();
    }

    public function bestProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Best Seller')->get();
    }

    public function discountProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Discount')->get();
    }

    public function newProduct()
    {
        return Product::where('status', 1)->where('product_type', 'New Arrival')->get();
    }

    public function ourProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Our Product')->get();
    }

    public function latestProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Latest')->get();
    }

    public function atentionProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Attention')->get();
    }

    public function featureProduct()
    {
        return Product::where('status', 1)->where('product_type', 'Feature')->get();
    }

    public function leaveMessage(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->message;
        $message->save();
        Toastr::success('Your message has been submitted', 'Success');
        return redirect()->back();
    }

    public function featureProductDetails($id)
    {
        $webCategories = WebCategory::all();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webProductDetails = Product::where('status', 1)->find($id);
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.product.details', compact('countries','conditions','webProducts','webAttentionProducts','webLatestProducts', 'webManufacturers','webBrands','webProductDetails','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function sellerProductDetails($id)
    {
        $webCategories = WebCategory::all();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webProductDetails = Product::where('status', 1)->find($id);
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.product.best-details', compact('countries','conditions','webProducts','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webProductDetails','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function topProductDetails($id)
    {
        $webCategories = WebCategory::all();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webProductDetails = Product::where('status', 1)->find($id);
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.product.top-details', compact('countries','conditions','webProducts','webAttentionProducts','webLatestProducts', 'webManufacturers','webBrands','webProductDetails','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function brandsDetails($id)
    {
        $webCategories = WebCategory::all();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webProductDetails = Product::where('status', 1)->find($id);
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.product.brand-details', compact('countries','conditions','cartProducts','webProducts','webAttentionProducts','webLatestProducts', 'webManufacturers','webBrands','webProductDetails','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function manufactureDetails($id)
    {
        $webCategories = WebCategory::all();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webProductDetails = Product::where('status', 1)->find($id);
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.product.manufacture-details', compact('countries','conditions','cartProducts','webProducts','webAttentionProducts','webLatestProducts', 'webManufacturers','webBrands','webProductDetails','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function categoryProductsDetails($id)
    {
        $webCategories = WebCategory::all();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webProductDetails = Product::where('status', 1)->find($id);
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.product.category-details', compact('countries','conditions','cartProducts','webProducts','webAttentionProducts','webLatestProducts', 'webManufacturers','webBrands','webProductDetails','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function allBrands()
    {
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllBrandProducts = Product::where('status', 1)->with('webbrand')->has('webbrand')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.brand.brand', compact('countries','conditions', 'webProducts','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webAllBrandProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function allManufacture()
    {
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.manufacture.manufacture', compact('countires','conditions','webProducts','webAttentionProducts','webLatestProducts', 'webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function categoryProducts()
    {
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $webProducts = Product::where('status', 1)->get();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.category.category', compact('countries','conditions','webProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function categoryWishProducts($id)
    {
        $categoryWishProducts = Category::with('product')->where('id', $id)->withCount('product')->first();
        $webCategory = Category::with('product')->where('id', $id)->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();

        $webManufacturers = WebManufacture::with('product')->get();

        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('cat_id')->withCount('subcategory')->where('cat_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('cat_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory','webManufacture')->groupBy('manufacture_id')->withCount('webManufacture')->where('cat_id', $id)->get();

        $webManufacturersCount = WebManufacture::with('product')->first();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();

        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();

        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.category.products', compact('categoryWiseProducts','subcategoryWiseProducts','manufactureWiseProducts','countries','conditions','webManufacturersCount','maxPrice','minPrice','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function countryWiseProduct($id, $name)
    {
        $categoryWishProducts = CountryProduct::where('status', 1)->where('name', $name)->get();
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('webproduct')->has('webproduct')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webManufacturersCount = WebManufacture::with('product')->first();
        $totalProduct = Cart::all()->count();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        $countryName  = Country::where('id', $id)->first();
        return view('version-1.fontend.country.country', compact('countryName','countries','conditions','webManufacturersCount','maxPrice','minPrice','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function filterProducts($id)
    {
         $categoryWishProducts = WebBrand::with('product')->where('id', $id)->withCount('product')->first();
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->withCount('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();

        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('cat_id')->withCount('subcategory')->where('cat_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('cat_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory','webManufacture')->groupBy('manufacture_id')->withCount('webManufacture')->where('cat_id', $id)->get();

        $isSelected = $id;
        $isManufactureSelected = $id;
        $isBrandSelected = $id;
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.category.products', compact('categoryWiseProducts','subcategoryWiseProducts','manufactureWiseProducts','countries','conditions','isBrandSelected','isManufactureSelected','maxPrice','minPrice', 'isSelected','categoryWishProducts','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function sliderPrice2($min, $max)
    {
        return $result = Product::where('status', 1)->where('sale_price', '>=', $min)->where('sale_price', '<=', $max)->get();
    }

    public function carBrand($id)
    {
        $brandName = WebBrand::where('id', $id)->first();

        $webCategory = Category::with('product')->has('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $brands = WebBrand::with('product')->withCount('product')->where('id', $id)->get();

        $webBrands = WebBrand::with('product')->withCount('product')->get();

        $categoryWishProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->withCount('subcategory')->where('brand_id', $id)->get();

        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('cat_id')->withCount('subcategory')->where('brand_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('brand_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('manufacture_id')->withCount('subcategory')->where('brand_id', $id)->get();


        $categoryWishAccessoriesProducts = WebBrand::with('accessoriesproduct')->withCount('accessoriesproduct')->where('id', $id)->first();
        $webManufacturers = WebManufacture::with('product')->has('product')->withCount('product')->get();
        $webManufacturersCount = WebManufacture::with('product')->first();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->has('product')->where('cat_id', $id)->get();
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $isConditionSelected = $id;
        $countries = Country::all();
        return view('version-1.fontend.brand.brand', compact(
            'categoryWishAccessoriesProducts',
            'brandName',
            'countries',
            'categoryWiseProducts',
            'subcategoryWiseProducts',
            'manufactureWiseProducts',
            'brands',
            'conditions',
            'webManufacturersCount',
            'maxPrice',
            'minPrice',
            'subcategoriesCount',
            'subcategories',
            'webProducts',
            'totalProduct',
            'cartProducts',
            'totalPriceSum',
            'categoryWishProducts',
            'webCategory',
            'webAttentionProducts',
            'webLatestProducts',
            'webAllCategoryProducts',
            'webManufacturers',
            'webBrands',
            'webAllManufactureProducts',
            'webCategories',
            'webFeatureProducts',
            'webBestSellerProducts',
            'webTopRatedProducts'));
    }

    public function filterCarBrandProducts($id)
    {
        $categoryWishProducts = WebBrand::with('product')->where('id', $id)->withCount('product')->first();
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->withCount('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('webproduct')->has('webproduct')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('cat_id')->withCount('subcategory')->where('brand_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('brand_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('manufacture_id')->withCount('subcategory')->where('brand_id', $id)->get();

        $isSelected = $id;
        $isManufactureSelected = $id;
        $isBrandSelected = $id;
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        $brandName = WebBrand::where('id', $id)->first();
        $brands = WebBrand::with('product')->withCount('product')->where('id', $id)->get();
        return view('version-1.fontend.brand.brand', compact('brands','categoryWiseProducts', 'subcategoryWiseProducts', 'manufactureWiseProducts','brandName','countries','conditions','isBrandSelected','isManufactureSelected','maxPrice','minPrice', 'isSelected','categoryWishProducts','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function topRated()
    {
        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $webCategory = Category::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $subcategoriesCount = Subcategory::with('product')->withCount('product')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $cartProducts = \Cart::content();
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.rated.rated', compact('countries','conditions','cartProducts','webLatestProducts','subcategoriesCount','minPrice','maxPrice','webCategory','webCategories','webProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }

    public function carManufacture($id)
    {
        $webCategory = Category::with('product')->withCount('product')->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webBrandsWiseProduct = WebBrand::with('product')->withCount('product')->where('id', $id)->first();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();

        $categoryWishProducts = WebManufacture::with('product')->withCount('product')->where('id', $id)->first();

        $subcategoriesCount = Product::where('status', 1)->with('webbrand', 'subcategory')->withCount('subcategory')->where('manufacture_id', $id)->get();

        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory', 'category')->groupBy('cat_id')->withCount('subcategory')->where('manufacture_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('manufacture_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'webmanufacture')->groupBy('manufacture_id')->withCount('webmanufacture')->where('manufacture_id', $id)->get();

        $categoryWishAccessoriesProducts = WebManufacture::with('accessoriesproduct')->withCount('accessoriesproduct')->where('id', $id)->first();
        $webManufacturersCount = WebManufacture::with('product')->first();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();
        $subcategoriesCounts = Subcategory::with('product')->withCount('product')->get();
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        $manufactureName = WebManufacture::where('id', $id)->first();
        return view('version-1.fontend.manufacture.manufacture', compact('manufactureName','categoryWiseProducts','subcategoryWiseProducts','manufactureWiseProducts','categoryWishProducts','subcategoriesCounts','categoryWishAccessoriesProducts','countries','conditions','webBrandsWiseProduct','webManufacturersCount','maxPrice','minPrice','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function filterCarManufactureProducts($id)
    {
        $categoryWishProducts = WebManufacture::with('product')->withCount('product')->where('id', $id)->first();
        $webCategory = Subcategory::with('category')->where('id', $id)->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->withCount('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();
        $subcategoriesCount = Product::where('status', 1)->with('webbrand', 'subcategory', 'category')->withCount('subcategory')->where('manufacture_id', $id)->get();

        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory', 'category')->groupBy('cat_id')->withCount('subcategory')->where('manufacture_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('manufacture_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'webmanufacture')->groupBy('manufacture_id')->withCount('webmanufacture')->where('manufacture_id', $id)->get();

        $isSelected = $id;
        $isManufactureSelected = $id;
        $isBrandSelected = $id;
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        $manufactureName = WebManufacture::where('id', $id)->first();
        return view('version-1.fontend.manufacture.manufacture', compact('manufactureWiseProducts','subcategoryWiseProducts','categoryWiseProducts','manufactureName','categoryWiseProducts', 'subcategoryWiseProducts', 'manufactureWiseProducts', 'countries','conditions','isBrandSelected','isManufactureSelected','maxPrice','minPrice', 'isSelected','categoryWishProducts','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function filterSubcategoryProducts($id)
    {
        $categoryWishProducts = Subcategory::with('product')->withCount('product')->where('id', $id)->first();
        $webCategory = Subcategory::with('category')->where('id', $id)->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->withCount('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();

        $subcategoriesCount = Product::where('status', 1)->with('webbrand', 'subcategory')->withCount('subcategory')->where('sub_cat_id', $id)->get();

        $subcategoriesWiseProduct = Product::where('status', 1)->with('webbrand', 'subcategory')->groupBy('sub_cat_id')->withCount('subcategory')->where('sub_cat_id', $id)->get();
        $manufactureWiseProduct = Product::where('status', 1)->with('webbrand', 'subcategory', 'webManufacture')->groupBy('manufacture_id')->withCount('subcategory')->where('sub_cat_id', $id)->get();

        $isSelected = $id;
        $isManufactureSelected = $id;
        $isBrandSelected = $id;
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.category.subcategory', compact('manufactureWiseProduct','subcategoriesWiseProduct','countries','conditions','isBrandSelected','isManufactureSelected','maxPrice','minPrice', 'isSelected','categoryWishProducts','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function filterConditionProducts($id)
    {
        $categoryWishProducts = Condition::with('products')->withCount('products')->where('id', $id)->first();
        $webCategory = Subcategory::with('category')->where('id', $id)->get();
        $webCategories = WebCategory::with('category')->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAllManufactureProducts = Product::where('status', 1)->with('webmanufacture')->has('webmanufacture')->withCount('webmanufacture')->get();
        $webAllCategoryProducts = Category::with('product')->has('product')->paginate(9);
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::with('product')->withCount('product')->get();
        $webManufacturers = WebManufacture::with('product')->withCount('product')->get();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $webProducts = Product::where('status', 1)->get();
        $subcategories = Subcategory::with('product')->where('cat_id', $id)->get();
        $subcategoriesCount = Product::where('status', 1)->with('webbrand', 'subcategory', 'condition')->withCount('condition')->where('condition_id', $id)->get();

        $categoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory', 'condition')->groupBy('cat_id')->withCount('subcategory')->where('condition_id', $id)->get();
        $subcategoryWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory', 'condition')->groupBy('sub_cat_id')->withCount('subcategory')->where('condition_id', $id)->get();
        $manufactureWiseProducts = Product::where('status', 1)->with('webbrand', 'subcategory','webManufacture', 'condition')->groupBy('manufacture_id')->withCount('webManufacture')->where('condition_id', $id)->get();

        $isSelected = $id;
        $isManufactureSelected = $id;
        $isBrandSelected = $id;
        $minPrice = Product::where('status', 1)->min('sale_price');
        $maxPrice = Product::where('status', 1)->max('sale_price');
        $conditions = Condition::with('products')->withCount('products')->get();
        $countries = Country::all();
        return view('version-1.fontend.condition.condition', compact('categoryWiseProducts','subcategoryWiseProducts','manufactureWiseProducts','countries','conditions','isBrandSelected','isManufactureSelected','maxPrice','minPrice', 'isSelected','categoryWishProducts','subcategoriesCount','subcategories','webProducts','totalProduct','cartProducts','totalPriceSum','categoryWishProducts','webCategory','webAttentionProducts','webLatestProducts', 'webAllCategoryProducts','webManufacturers','webBrands','webAllManufactureProducts','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts'));
    }

    public function downloads(){

        $webCategories = WebCategory::all();
        $webProducts = Product::where('status', 1)->get();
        $webFeatureProducts = Product::where('status', 1)->where('product_type', 'Feature')->orderBy('id', 'DESC')->get();
        $webSoftwareProducts = Product::where('status', 1)->where('product_type', 'Software')->orderBy('id', 'DESC')->get();
        $webBestSellerProducts = Product::where('status', 1)->where('product_type', 'Best Seller')->orderBy('id', 'DESC')->get();
        $webTopRatedProducts = Product::where('status', 1)->where('product_type', 'Top Rated')->orderBy('id', 'DESC')->get();
        $webAttentionProducts = Product::where('status', 1)->where('product_type', 'Attention')->orderBy('id', 'DESC')->get();
        $webLatestProducts = Product::where('status', 1)->where('product_type', 'Latest')->orderBy('id', 'DESC')->get();
        $webBrands = WebBrand::all();
        $webManufacturers = WebManufacture::all();
        $totalProduct = Cart::all()->count();
        $cartProducts = \Cart::content();
        $totalPriceSum = \DB::table('carts')->sum('sub_total');
        $countries = Country::all();
        return view('version-1.fontend.download.download', compact('countries','webSoftwareProducts','webProducts','totalPriceSum','cartProducts','totalProduct','webAttentionProducts','webLatestProducts','webManufacturers','webBrands','webCategories', 'webFeatureProducts', 'webBestSellerProducts', 'webTopRatedProducts', 'webBrands', 'webManufacturers'));
    }
}
