<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\BulkImport;
use App\Model\Category;
use App\Model\Country;
use App\Model\Product;
use App\Model\Download;
use App\Model\ProductQuality;
use App\Model\Subcategory;
use App\Model\WebBrand;
use App\Model\WebManufacture;
use App\Model\WebProduct;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class WebProductController extends Controller
{

    public function bulkProductsView()
    {
        $categories = Category::all();
        return view('backend.admin.setting.product.bulk', compact('categories'));
    }

    public function export()
    {
        return Excel::download(new ProductExport(), 'product.xlsx');
    }

    public function bulkProductsStore(Request $request)
    {
        $bulkInsert =  Excel::toCollection(new BulkImport,$request->file('file'));
        //dd($bulkInsert);
        foreach($bulkInsert[0] as $data) {
            //dd($data);
//            ProductTrait::where('id', $data)->update([
//
//            ]);

            Product::updateOrCreate(
                [
                    'id' => $data
                ],
                [
                    'qty' => $data[2],
                    'name' => $data[3],
                    'product_model' => $data[4],
                    'sku'                    => $data[10],
                    'short_description'      => $data[11],
                    'sale_price'             => $data[18],
                ]
            );
        }
        Toastr::success('ProductTrait Bulk Import successfully', 'Success');
        return back();
    }

    public function index()
    {
        $webProducts = Product::where('status', 1)->with('category')->get();
        return view('backend.admin.setting.product.index', compact('webProducts'));
    }

    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $webBrands = WebBrand::all();
        $webManufactureres = WebManufacture::all();
        $countries = Country::all();
        return view('backend.admin.setting.product.add', compact('countries','subcategories','categories', 'webBrands', 'webManufactureres'));
    }

    public function edit($id)
    {
        $webProduct = Product::where('status', 1)->find($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $webBrands = WebBrand::all();
        $webManufactureres = WebManufacture::all();
        $countries = Country::all();
        return view('backend.admin.setting.product.edit', compact('countries','webProduct','subcategories','categories', 'webBrands', 'webManufactureres'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'cat_id' => 'required'
        ]);
        $imageName = time().'_'.'.'. $request->image->extension();
        $request->image->move(('product'), $imageName);

        if($request->hasfile('bulk_image'))
        {
            foreach($request->file('bulk_image') as $file)
            {
                $name = Str::random().'.'.$file->extension();
                $file->move('/products/', $name);
                $data[] = $name;
            }
        }

        $webProduct = new WebProduct();
        $webProduct->name = strtolower($request->name);
        $webProduct->price = $request->price;
        $webProduct->pre_price = $request->pre_price;
        $webProduct->conditions = $request->conditions;
        $webProduct->sku = $request->sku;
        $webProduct->short_description = $request->short_description;
        $webProduct->long_description = $request->long_description;
        $webProduct->key_feature = $request->key_feature;
        $webProduct->specification = $request->specification;
        $webProduct->product_type = $request->product_type;
        $webProduct->cat_id = $request->cat_id;
        $webProduct->sub_cat_id = $request->sub_cat_id;
        $webProduct->brand_id = $request->brand_id;
        $webProduct->country_id = $request->country_id;
        $webProduct->new = $request->new;
        $webProduct->hot = $request->hot;
        $webProduct->sale = $request->sale;
        $webProduct->manufacture_id = $request->manufacture_id;
        $webProduct->image = $imageName;
        $webProduct->bulk_image = json_encode($data);;
        $webProduct->save();

        Toastr::success('ProductTrait has been successfully created', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required',
            'cat_id' => 'required'
        ]);

        $webProduct = WebProduct::find($id);

        if($request->hasfile('image'))
        {
            if (file_exists(('product/'.$webProduct->image))) {
                unlink(('product/'.$webProduct->image));
            }
            $imageName = time().'_'.'.'. $request->image->extension();
            $request->image->move(('product'), $imageName);
            $webProduct->image = $imageName;
            $webProduct->save();
        }

        if($request->hasfile('bulk_image'))
        {
            foreach($request->file('bulk_image') as $file)
            {
                $name = Str::random().'.'.$file->extension();
                $file->move('/products/', $name);
                $data[] = $name;
            }
            $webProduct->bulk_image = json_encode($data);
            $webProduct->save();
        }

        $webProduct->name = strtolower($request->name);
        $webProduct->price = $request->price;
        $webProduct->pre_price = $request->pre_price;
        $webProduct->conditions = $request->conditions;
        $webProduct->sku = $request->sku;
        $webProduct->short_description = $request->short_description;
        $webProduct->long_description = $request->long_description;
        $webProduct->key_feature = $request->key_feature;
        $webProduct->specification = $request->specification;
        $webProduct->product_type = $request->product_type;
        $webProduct->cat_id = $request->cat_id;
        $webProduct->sub_cat_id = $request->sub_cat_id;
        $webProduct->brand_id = $request->brand_id;
        $webProduct->country_id = $request->country_id;
        $webProduct->new = $request->new;
        $webProduct->hot = $request->hot;
        $webProduct->sale = $request->sale;
        $webProduct->manufacture_id = $request->manufacture_id;
        $webProduct->save();

        Toastr::success('ProductTrait has been successfully Update', 'success');
        return redirect('/web/products');
    }

    public function destroy($id)
    {
        $webProductDelete = WebProduct::find($id);
        $webProductDelete->delete();
        Toastr::success('ProductTrait has been successfully deleted', 'success');
        return redirect()->back();
    }

    public function downloads(){
        return view('backend.admin.product.downloads');
    }

    public function addDownloads(){
        return view('backend.admin.product.add-downloads');
    }

    public function storeDownloads(Request $r){
        // dd($r->image);

        $r->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $d = new Download;

        if (isset($r->image)) { 
            $image = $r->image;
            $imageName = time().'_'.'.'. $image->extension();
            $image->move( 'fontend/downloads/' , $imageName );
            $d->image = $imageName;
        }



        $d->name = $r->name;
        $d->link = $r->link;

        $d->save();

        session()->flash('my_success', 'Download saved');
        return redirect('web/downloads');
    }

    public function deleteDownloads(Request $r, $id){

        if( Download::find($id) != null ){
            Download::find($id)->delete();

            session()->flash('my_success', 'Download deleted');
            return redirect('web/downloads');
        }

        return redirect()->back();

    }

    public function editDownloads($id){
        $d = Download::find($id);
        return view('backend.admin.product.edit-downloads', compact('d'));
    }



    public function updateDownloads(Request $r, $id){

        $r->validate([
            'name' => 'required',
            'link' => 'required',
        ]);

        $d = Download::find($id);

        if($d == null){
            return redirect()->back();
        }

        if (isset($r->image)) { 
            $image = $r->image;
            $imageName = time().'_'.'.'. $image->extension();
            $image->move( 'fontend/downloads/' , $imageName );
            $d->image = $imageName;
        }



        $d->name = $r->name;
        $d->link = $r->link;

        $d->save();

        session()->flash('my_success', 'Download saved');
        return redirect('web/downloads');
    }
}
