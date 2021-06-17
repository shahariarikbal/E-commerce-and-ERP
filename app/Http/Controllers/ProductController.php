<?php

namespace App\Http\Controllers;

use App\Model\Accessories;
use App\Model\AccessoriesProduct;
use App\Model\Brand;
use App\Model\BulkImage;
use App\Model\Category;
use App\Model\Condition;
use App\Model\ConditionProduct;
use App\Model\Country;
use App\Model\CountryProduct;
use App\Model\Customer;
use App\Model\Product;
use App\Model\ProductBrand;
use App\Model\ProductCategory;
use App\Model\ProductKeyFeature;
use App\Model\ProductManufacture;
use App\Model\ProductSubcategory;
use App\Model\ProductUnit;
use App\Model\Stock;
use App\Model\Subcategory;
use App\Model\Supplier;
use App\Model\SupplierPrice;
use App\Model\WebBrand;
use App\Model\WebManufacture;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;

use App\Model\Admin;
use DataTables;

class ProductController extends Controller
{

    public function index(Request $request)
    {

        // return $request;

        // $sql = Product::with('productCategory', 'productManufacture', 'productBrands', 'productSubcategory')->orderBy('updated_at', 'asc');
        $sql = Product::with('productCategory', 'productManufacture', 'productBrands', 'productSubcategory');

        // $sql = Product::where('status', 1)->with('productCategory', 'productManufacture', 'productBrands', 'productSubcategory')->orderBy('updated_at', 'asc');

        // return Product::where('status', 1)->with('productBrands')->get();



        if (isset($request->key)) {
            $sql->where('sku', 'LIKE', '%' . $request->key . '%')
                ->orWhere('name', 'LIKE', '%' . $request->key . '%');
        }


        $bf = request()->filled('brand');
        $cf = request()->filled('category');
        $mf = request()->filled('manu');
        $sf = request()->filled('key');



        if( $bf && $cf && $mf ){

            $sql->whereHas('productBrands', function (Builder $query)  use ($request) {
                    $query->where('brand_id', $request->brand);
                })
                ->whereHas('productCategory', function (Builder $query)  use ($request) {
                    $query->where('category_id', $request->category);
                })
                ->whereHas('productManufacture', function (Builder $query)  use ($request) {
                    $query->where('manufacture_id', $request->manu);
                })
                ->orderBy('updated_at', 'asc');

        }elseif ( $bf && $cf) {

            $sql->whereHas('productBrands', function (Builder $query)  use ($request) {
                    $query->where('brand_id', $request->brand);
                })
                ->whereHas('productCategory', function (Builder $query)  use ($request) {
                    $query->where('category_id', $request->category);
                })
                ->orderBy('updated_at', 'asc');
            
        }elseif ( $cf && $mf ) {

            $sql->whereHas('productCategory', function (Builder $query)  use ($request) {
                    $query->where('category_id', $request->category);
                })
                ->whereHas('productManufacture', function (Builder $query)  use ($request) {
                    $query->where('manufacture_id', $request->manu);
                })
                ->orderBy('updated_at', 'asc');
            
        }elseif ( $bf && $mf ) {

            $sql->whereHas('productBrands', function (Builder $query)  use ($request) {
                    $query->where('brand_id', $request->brand);
                })
                ->whereHas('productManufacture', function (Builder $query)  use ($request) {
                    $query->where('manufacture_id', $request->manu);
                })
                ->orderBy('updated_at', 'asc');
            
        }elseif ( $bf  ) {

            $sql->whereHas('productBrands', function (Builder $query)  use ($request) {
                    $query->where('brand_id', $request->brand);
                })
                ->orderBy('updated_at', 'asc');
            
        }elseif ( $cf ) {

            $sql->whereHas('productCategory', function (Builder $query)  use ($request) {
                    $query->where('category_id', $request->category);
                })
                ->orderBy('updated_at', 'asc');
            
        }elseif ( $mf ) {

            $sql->whereHas('productManufacture', function (Builder $query)  use ($request) {
                    $query->where('manufacture_id', $request->manu);
                })
                ->orderBy('updated_at', 'asc');
            
        }

        
        $products = $sql->paginate(10)->appends(request()->input());

        // dd($request->filled('key'));

        return view('backend.admin.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::where('status', 'active')->get();
        $brands = WebBrand::get();
        $units = ProductUnit::where('status', 'active')->get();
        $countries = Country::all();
        $webManufactureres = WebManufacture::all();
        $conditions = Condition::all();
        $accessories = Accessories::all();

        $products = Product::with('category', 'subcategory', 'brand', 'supplierPrice')->get();

        return view('backend.admin.product.add', compact('products','accessories','conditions','webManufactureres','countries','suppliers', 'categories', 'brands', 'units', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sku' => 'required',
        ]);

        if ($request->image) {
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('product'), $imageName);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->condition_id = $request->condition_id;
        $product->sku = $request->sku;
        $product->unit = $request->unit;
        $product->tax = $request->tax;
        $product->qty = $request->qty;

        $product->height = $request->height;
        $product->weight = $request->weight;
        $product->depth = $request->depth;
        $product->width = $request->width;

        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->specification = $request->specification;
        $product->product_type = $request->product_type;
        $product->new = $request->new;
        $product->hot = $request->hot;
        $product->sale = $request->sale;
        $product->product_weight = $request->product_weight;
        $product->product_model = $request->product_model;
        $product->shipping_cost = $request->shipping_cost;
        $product->cost = $request->cost;
        $product->total_cost = $request->total_cost;
        $product->factory_option = $request->factory_option;
        $product->vat = $request->vat;
        $product->product_measurement = $request->product_measurement;
        $product->sale_price = $request->sale_price;
        $product->pre_price = $request->pre_price;
        $product->updated_at = '2000-00-00 00:00:00';
        if ($request->image) {
            $product->image = $imageName;
        }

//        $product->bulk_image = json_encode($data);;

        if (!empty($product)) {
            if ($request->filled('country_id')){
                foreach ($request->country_id as $key => $country) {
                    $countryProduct = new CountryProduct();
                    $countryProduct->product_id = $product->id;
                    $countryProduct->name = $request->country_id[$key];
                    $countryProduct->save();
                }
            }
        }

        if ($request->filled('accessories_id')) {
            foreach ($request->accessories_id as $key => $accessories) {
                $accessoriesProduct = new AccessoriesProduct();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->accessories_id = $request->accessories_id[$key];
                $accessoriesProduct->save();
            }
        }

        if ($request->filled('brand_id')) {
            foreach ($request->brand_id as $key => $brand) {
                $accessoriesProduct = new ProductBrand();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->brand_id = $request->brand_id[$key];
                $accessoriesProduct->save();
            }
        }

        if ($request->filled('manufacture_id')) {
            foreach ($request->manufacture_id as $key => $brand) {
                $accessoriesProduct = new ProductManufacture();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->manufacture_id = $request->manufacture_id[$key];
                $accessoriesProduct->save();
            }
        }

        if ($request->filled('sub_cat_id')) {
            foreach ($request->sub_cat_id as $key => $brand) {
                $accessoriesProduct = new ProductSubcategory();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->subcategory_id = $request->sub_cat_id[$key];
                $accessoriesProduct->save();
            }
        }

        if ($request->filled('cat_id')) {
            foreach ($request->cat_id as $key => $brand) {
                $accessoriesProduct = new ProductCategory();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->category_id = $request->cat_id[$key];
                $accessoriesProduct->save();
            }
        }

        if (!empty($product)) {
            if ($request->filled('key_feature')) {
                foreach ($request->key_feature as $key => $key_feature) {
                    $key_feature = new ProductKeyFeature();
                    $key_feature->product_id = $product->id;
                    $key_feature->name = $request->key_feature[$key];
                    $key_feature->save();
                }
            }
        }

        if ($files = $request->file('bulk_image')) {
            // Define upload path
            // $destinationPath = ('products'); // upload path
            foreach($files as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move(('products'), $profileImage);
                // Save In Database
                $bulkImage= new BulkImage();
                $bulkImage->product_id = $product->id;
                $bulkImage->photo = $profileImage;
                $bulkImage->save();
            }

        }


        if (!empty($product)) {
            $stock = new Stock();
            $stock->product_id = $product->id;
            $stock->in_qty = $request->qty;
            $stock->available_qty = $request->qty;
            $stock->save();
        }


        $product->save();

        Toastr::success('Product create successfully', 'Success');
        return redirect('/products/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $supplierPrice = SupplierPrice::with('products')->where('product_id', $product->id)->get();
        $suppliers = Supplier::all();
        $categories = Category::with('productCategory')->where('status', 'active')->get();
        $subcategories = Subcategory::with('productSubcategory')->where('status', 'active')->get();
        $brands = WebBrand::get();
        $units = ProductUnit::where('status', 'active')->get();

        $info = [];
        foreach ($product->countryProduct as $data) {
            $info[] = $data->name;
        }

        $countries = Country::whereNotIn('name' ,$info )->get();

        $information = [];
        foreach ($product->accessoriesProduct as $data) {
            $information[] = $data->name;
        }

        $accessories = Accessories::get();

        //return $product->unit;

        $webManufactureres = WebManufacture::all();
        $conditions = Condition::all();

        $products = Product::with('category', 'subcategory', 'brand', 'supplierPrice')->get();

        return view('backend.admin.product.edit', compact('products','accessories','conditions','webManufactureres','countries','product', 'supplierPrice', 'suppliers', 'categories', 'subcategories', 'brands', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //return $request->all();
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sku' => 'required',
        ]);

        //dd($product->image);

        if($request->hasfile('image'))
        {
            if ($product->image) {
                file_exists(('product/').$product->image);
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('product'), $imageName);
            $product->image = $imageName;
            $product->save();
        }

//        if($request->hasfile('bulk_image'))
//        {
//            foreach($request->file('bulk_image') as $file)
//            {
//                $name = Str::random().'.'.$file->extension();
//                $file->move(public_path().'/products/', $name);
//                $data[] = $name;
//            }
//            $product->bulk_image = json_encode($data);
//            $product->save();
//        }

        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->unit = $request->unit;
        $product->tax = $request->tax;
        $product->qty = $request->qty;

        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;

        $product->specification = $request->specification;
        $product->product_type = $request->product_type;


        $product->new = $request->new;
        $product->hot = $request->hot;
        $product->sale = $request->sale;

        $product->height = $request->height;
        $product->weight = $request->weight;
        $product->depth = $request->depth;
        $product->width = $request->width;


        $product->product_weight = $request->product_weight;
        $product->product_model = $request->product_model;
        $product->condition_id = $request->condition_id;
        $product->shipping_cost = $request->shipping_cost;
        $product->cost = $request->cost;
        $product->total_cost = $request->total_cost;
        $product->factory_option = $request->factory_option;
        $product->vat = $request->vat;
        $product->product_measurement = $request->product_measurement;
        $product->sale_price = $request->sale_price;
        $product->pre_price = $request->pre_price;

        if (!empty($product)) {
            if ($request->filled('country_id')) {
                $countries = CountryProduct::where('product_id', $product->id)->delete();
                foreach ($request->country_id as $key => $country) {
                    $countryProduct = new CountryProduct();
                    $countryProduct->product_id = $product->id;
                    $countryProduct->name = $request->country_id[$key];
                    $countryProduct->save();
                }
            }
        }

        if ($request->filled('accessories_id')) {

            AccessoriesProduct::where('product_id', $product->id)->delete();

            foreach ($request->accessories_id as $key => $accessories) {
                $accessoriesProduct = new AccessoriesProduct();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->accessories_id = $request->accessories_id[$key];
                $accessoriesProduct->save();
            }
        }

        if ($request->filled('brand_id')) {
            ProductBrand::where('product_id', $product->id)->delete();
            foreach ($request->brand_id as $key => $brand) {
                $accessoriesProduct = new ProductBrand();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->brand_id = $request->brand_id[$key];
                $accessoriesProduct->save();
            }
        }else{
            ProductBrand::where('product_id', $product->id)->delete();
        }

        if ($request->filled('manufacture_id')) {
            ProductManufacture::where('product_id', $product->id)->delete();
            foreach ($request->manufacture_id as $key => $brand) {
                $accessoriesProduct = new ProductManufacture();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->manufacture_id = $request->manufacture_id[$key];
                $accessoriesProduct->save();
            }
        }else{
            ProductManufacture::where('product_id', $product->id)->delete();
        }

        if ($request->filled('sub_cat_id')) {
            ProductSubcategory::where('product_id', $product->id)->delete();
            foreach ($request->sub_cat_id as $key => $brand) {
                $accessoriesProduct = new ProductSubcategory();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->subcategory_id = $request->sub_cat_id[$key];
                $accessoriesProduct->save();
            }
        }else{
           ProductSubcategory::where('product_id', $product->id)->delete();
        }

        // dd($request->filled('cat_id'));
        if ($request->filled('cat_id')) {
            ProductCategory::where('product_id', $product->id)->delete();
            foreach ($request->cat_id as $key => $brand) {
                $accessoriesProduct = new ProductCategory();
                $accessoriesProduct->product_id = $product->id;
                $accessoriesProduct->category_id = $request->cat_id[$key];
                $accessoriesProduct->save();
            }
        }else{
           ProductCategory::where('product_id', $product->id)->delete();
        }

        if (!empty($product)) {
            if ($request->filled('key_feature')) {
                ProductKeyFeature::where('product_id', $product->id)->delete();
                foreach ($request->key_feature as $key => $key_feature) {
                    $key_feature = new ProductKeyFeature();
                    $key_feature->product_id = $product->id;
                    $key_feature->name = $request->key_feature[$key];
                    $key_feature->save();
                }
            }
        }

        //$bulkimages = BulkImage::where('product_id', $product->id)->delete();

        if ($request->hasFile('bulk_image')) {

            // $destinationPath = ('/products/'); // upload path
            foreach($request->file('bulk_image') as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();

                $img->move(('products'), $profileImage);
                // Save In Database
                $bulkImage= new BulkImage();
                $bulkImage->product_id = $product->id;
                $bulkImage->photo = $profileImage;
                $bulkImage->save();
            }


        }

        if (!empty($product)) {
            Stock::updateOrCreate(
                [
                    'product_id' => $product->id
                ],
                [
                    'in_qty'        => $request->qty,
                    'available_qty' => $request->qty
                ]
            );
        }

        $product->updated_at = date('Y-m-d H:i:s');
        $product->save();

        Toastr::success('Product update successfully', 'Success');
        return redirect('/products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Toastr::success('Product has been successfully deleted');
        return redirect()->back();
    }


    // product active
    public function active(Product $product)
    {
        $product->status = 0;
        $product->save();
        Toastr::success('Product has been successfully Inactivated', 'success');
        return redirect()->back();
    }

    // product inactive
    public function inactive(Product $product)
    {
        $product->status = 1;
        $product->save();
        Toastr::success('Product has been successfully Activated', 'success');
        return redirect()->back();
    }

    public function categoryWishProduct($id)
    {
        $categoryWishSubcategory = Subcategory::with('category')->where('cat_id', $id)->get();
        return response()->json($categoryWishSubcategory);
    }

    public function editProductDelete($id)
    {
        $bulkImageDelete = BulkImage::find($id);
        $bulkImageDelete->delete();
        Toastr::success('Image Delete successfully', 'Success');
        return redirect()->back();
    }

    public function editSingleProductDelete($id)
    {
        $singleImageDelete = Product::find($id);
        $singleImageDelete->update([
            'image' => null
        ]);
        Toastr::success('Image Delete successfully', 'Success');
        return redirect()->back();
    }

    public function featureFieldDelete($id)
    {
        $featureFieldDelete = ProductKeyFeature::find($id);
        $featureFieldDelete->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
