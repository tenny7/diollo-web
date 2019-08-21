<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Brand;

use App\Models\Order;
use App\Models\Store;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\OrderProduct;
// use Spatie\Searchable\Searchable;
use App\Models\ProductImage;
use App\Traits\UploadableTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use willvincent\Rateable\Rateable;
// use Illuminate\Notifications\Notifiable;

class Product extends BaseModel
{
    use UploadableTrait;
    use Rateable;
    

    const FEATURED_PRODUCT = 2;
    const CLEARANCE_PRODUCT = 3;

    protected $fillable = [
        'name', 'slug', 'code', 'description', 'quick_description', 'waranty', 'status', 'original_price', 'discount_price', 'qty', 'brand', 'is_taxable', 'meta_title', 'meta_description', 'store', 'agent',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_taxable' => 'boolean',
    ];

    /**
     * Product has many Categories.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    /**
     * Product belongs to a store.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Product is added by an agent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function agent()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Product is manufactured by a brand.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Product has many Images.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }

    /**
     * Product has many Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('price', 'qty');
        // , 'tax_amount'
    }

    // public function orderproduct()
    // {
    //     return $this->hasMany(OrderProduct::class);
    //     // , 'tax_amount'
    // }

    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function productimages()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Product has many Review.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Product has discount.
     *
     * @return boolean
     */
    public function hasDiscount()
    {
        return ($this->discount_price > 0)?true:false;
    }


    public function setSlugAttribute($value)
    {
        $slug = Str::slug($value);
        $slugCount = count( $this->whereRaw("slug REGEXP '^{$slug}(-[0-9]*)?$'")->get() );
        $slugFinal = ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
        $this->attributes['slug'] = $slugFinal;
    }

    public static function getProductBySlug($slug)
    {
        $model = new static;
        return $model->where('slug', '=', $slug)->first();
    }

    /**
     * Save Product Categories
     *
     * @param array $data
     * @return void
     */
    protected function saveProductCategories(array $params)
    {
        $this->categories()->sync($params);
    }

    /**
     * @param Brand $brand
     */
    public function saveBrand(Brand $brand)
    {
        $this->brand()->associate($brand);
    }

    // public function storeFile($file)
    // {
        // $name = $file->getClientOriginalExtention();
        // $folder = '/productImages';
    // }

    /**
     * @param Collection $collection
     *
     * @return void
     */
    public function saveProductImages(Collection $collection)
    {
        // dd($this->id);
        $collection->each(function (UploadedFile $file) {
            $filename = $this->storeFile($file);
            $productImage = new ProductImage([
                'product_id' => $this->id,
                'path' => $filename
            ]);
            
            $this->images()->save($productImage);
        });
    }

    /**
     * Update the Product and Product Related Data.
     *
     * @var array $data
     * @return void
     */
    public function saveProduct($data)
    {
        $this->update($data);
        $this->saveProductImages($data);
        $this->saveProductCategories($data);
        return $this;
    }

    /**
     * Detach the categories
     */
    public function detachCategories()
    {
        $this->categories()->detach();
    }

    /**
     * Delete the product
     *
     * @param Product $product
     *
     * @return bool
     * @throws \Exception
     * @deprecated
     * @use removeProduct
     */
    public function deleteProduct()
    {
        $this->categories()->detach();
        $this->images()->delete();
        return $this->delete();
    }

    /**
     * Get .
     */
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}
