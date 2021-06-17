<?php

namespace App\Model;

use App\Traits\ProductTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use ProductTrait;
    protected $guarded = [];

    //**********************//
    //***  Relationship  ***//
    //**********************//

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function productCats()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function productSubs()
    {
        return $this->belongsToMany(Subcategory::class, 'product_subcategories');
    }

    public function productManus()
    {
        return $this->belongsToMany(WebManufacture::class, 'product_manufactures', 'product_id', 'manufacture_id');
    }

    public function productBrs()
    {
        return $this->belongsToMany(WebBrand::class, 'product_brands', 'product_id', 'brand_id');
    }

    public function webManufacture()
    {
        return $this->belongsTo(WebManufacture::class, 'manufacture_id', 'id');
    }

    public function webbrand()
    {
        return $this->belongsTo(WebBrand::class, 'brand_id', 'id');
    }

    public function productQuality()
    {
        return $this->hasMany(ProductQuality::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class,'product_id', 'id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_cat_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(WebBrand::class, 'brand_id', 'id');
    }

    public function supplierPrice()
    {
        return $this->hasMany(SupplierPrice::class);
    }

    public function customerPrice()
    {
        return $this->hasMany(SaleProduct::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function purchaseProduct()
    {
        return $this->hasMany(PurchaseProduct::class);
    }

    public function purchaseProductCount()
    {
        return $this->hasMany(ProductQtyCount::class, 'product_id', 'id');
    }

    public function saleProductCount()
    {
        return $this->hasMany(SaleProductCount::class, 'product_id', 'id');
    }

    public function stockes()
    {
        return $this->hasMany(Stock::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'product_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'condition_id', 'id');
    }

    public function bulkproducts()
    {
        return $this->hasMany(BulkImage::class);
    }

    public function countryProduct()
    {
        return $this->hasMany(CountryProduct::class);
    }

    public function accessoriesProduct()
    {
        return $this->hasMany(AccessoriesProduct::class);
    }

    public function feature()
    {
        return $this->hasMany(ProductKeyFeature::class, 'product_id', 'id');
    }

    public function productBrands()
    {
        return $this->hasMany(ProductBrand::class, 'product_id', 'id');
    }

    public function productManufacture()
    {
        return $this->hasMany(ProductManufacture::class);
    }

    public function productCategory()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function productSubcategory()
    {
        return $this->hasMany(ProductSubcategory::class);
    }
}
