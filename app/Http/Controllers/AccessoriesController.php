<?php

namespace App\Http\Controllers;

use App\Imports\BulkAccessories;
use App\Imports\BulkImport;
use App\Model\Accessories;
use App\Model\AccessoriesBulkImage;
use App\Model\Category;
use App\Model\Condition;
use App\Model\Country;
use App\Model\CountryProduct;
use App\Model\ProductUnit;
use App\Model\Stock;
use App\Model\Subcategory;
use App\Model\WebBrand;
use App\Model\WebManufacture;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AccessoriesController extends Controller
{
    public function accessoriesManage()
    {
        $accessories = Accessories::with('category', 'subcategory', 'brand')->orderBy('id', 'DESC')->get();
        return view('backend.admin.accessories.manage', compact('accessories'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::where('status', 'active')->get();
        $brands = WebBrand::get();
        $webManufactureres = WebManufacture::all();
        $units = ProductUnit::where('status', 'active')->get();
        $countries = Country::all();
        $conditions = Condition::all();
        return view('backend.admin.accessories.add', compact('conditions','countries','units','categories', 'subcategories', 'brands', 'webManufactureres'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sku' => 'required',
            'price' => 'required',
        ]);

        $imageName = time().'_'.'.'. $request->image->extension();
        $request->image->move(public_path('product'), $imageName);

        $product = new Accessories();
        $product->name = $request->name;
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->condition_id = $request->condition_id;
        $product->manufacture_id = $request->manufacture_id;
        $product->sku = $request->sku;
        $product->unit = $request->unit;
        $product->tax = $request->tax;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;;
        $product->key_feature = $request->key_feature;
        $product->specification = $request->specification;
        $product->new = $request->new;
        $product->hot = $request->hot;
        $product->sale = $request->sale;
        $product->weight = $request->weight;
        $product->model = $request->model;
        $product->brand_id = $request->brand_id;
        $product->shipping_cost = $request->shipping_cost;
        $product->cost = $request->cost;
        $product->total_cost = $request->total_cost;
        $product->vat = $request->vat;
        $product->measurement = $request->measurement;
        $product->price = $request->price;
        $product->pre_price = $request->pre_price;
        $product->image = $imageName;
        $product->save();

        if (!empty($product)) {
            $stock = new Stock();
            $stock->accessories_id = $product->id;
            $stock->in_qty = $request->qty;
            $stock->available_qty = $request->qty;
            $stock->save();
        }

        if ($files = $request->file('bulk_image')) {
            // Define upload path
            $destinationPath = public_path('/products/'); // upload path
            foreach($files as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);
                // Save In Database
                $bulkImage= new AccessoriesBulkImage();
                $bulkImage->accessories_id = $product->id;
                $bulkImage->image = $profileImage;
                $bulkImage->save();
            }

        }

        Toastr::success('Accessories Product create successfully', 'Success');
        return redirect('accessories/index');
    }

    public function edit(Accessories $accessories)
    {
        $categories = Category::where('status', 'active')->get();
        $subcategories = Subcategory::where('status', 'active')->get();
        $brands = WebBrand::get();
        $webManufactureres = WebManufacture::all();
        $units = ProductUnit::where('status', 'active')->get();

        $conditions = Condition::all();
        return view('backend.admin.accessories.edit', compact('conditions','accessories','units','categories', 'subcategories', 'brands', 'webManufactureres'));
    }

    public function update(Request $request, Accessories $accessories)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'sku' => 'required',
            'price' => 'required',
        ]);

        if($request->hasfile('image'))
        {
            if ($accessories->image) {
                file_exists(public_path('product/').$accessories->image);
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(public_path('product'), $imageName);
            $accessories->image = $imageName;
            $accessories->save();
        }

        $accessories->name = $request->name;
        $accessories->cat_id = $request->cat_id;
        $accessories->sub_cat_id = $request->sub_cat_id;
        $accessories->manufacture_id = $request->manufacture_id;
        $accessories->condition_id = $request->condition_id;
        $accessories->sku = $request->sku;
        $accessories->unit = $request->unit;
        $accessories->tax = $request->tax;
        $accessories->qty = $request->qty;
        $accessories->short_description = $request->short_description;
        $accessories->long_description = $request->long_description;;
        $accessories->key_feature = $request->key_feature;
        $accessories->specification = $request->specification;
        $accessories->new = $request->new;
        $accessories->hot = $request->hot;
        $accessories->sale = $request->sale;
        $accessories->weight = $request->weight;
        $accessories->model = $request->model;
        $accessories->brand_id = $request->brand_id;
        $accessories->shipping_cost = $request->shipping_cost;
        $accessories->cost = $request->cost;
        $accessories->total_cost = $request->total_cost;
        $accessories->vat = $request->vat;
        $accessories->measurement = $request->measurement;
        $accessories->price = $request->price;
        $accessories->pre_price = $request->pre_price;
        $accessories->save();

        if (!empty($accessories)) {
            Stock::updateOrCreate(
                [
                    'accessories_id' => $accessories->id
                ],
                [
                    'in_qty' => $request->qty,
                    'available_qty' => $request->qty
                ]
            );
        }

        if ($request->hasFile('bulk_image')) {

            $destinationPath = public_path('/products/'); // upload path
            foreach($request->file('bulk_image') as $img) {
                // Upload Orginal Image
                $profileImage =$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);
                // Save In Database
                $bulkImage= new AccessoriesBulkImage();
                $bulkImage->accessories_id = $accessories->id;
                $bulkImage->image = $profileImage;
                $bulkImage->save();
            }


        }

        Toastr::success('Accessories Product update successfully', 'Success');
        return redirect('accessories/index');
    }

    public function destroy(Accessories $accessories)
    {
        $accessories->delete();
        Toastr::success('Product has been successfully deleted');
        return redirect()->back();
    }

    public function bulkAccessoriesStore(Request $request)
    {
        $bulkInsert =  Excel::import(new BulkAccessories,$request->file('file'));
        Toastr::success('Bulk Accessories Import successfully', 'Success');
        return redirect()->back();
    }

    public function editAccessoriesProductDelete($id)
    {
        $bulkImageDelete = AccessoriesBulkImage::find($id);
        $bulkImageDelete->delete();
        Toastr::success('Image Delete successfully', 'Success');
        return redirect()->back();
    }
}
