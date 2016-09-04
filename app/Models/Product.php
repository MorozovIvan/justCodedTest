<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'quantity'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'product_categories');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function discount()
    {
        return $this->HasMany('App\Models\ProductDiscount');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->HasMany('App\Models\ProductImage');
    }
}
