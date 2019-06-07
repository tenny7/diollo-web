<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name', 'slug', 'meta_title', 'meta_description'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parentCategory()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function getParentNameAttribute()
    {
        $parentCategory = $this->where('id', '=', $this->attributes['parent_id'])->get()->first();
        return (null != $parentCategory) ? $parentCategory->name : '';
    }
}
