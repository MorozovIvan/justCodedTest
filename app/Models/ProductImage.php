<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    const UPLOAD_PATH = 'uploads/images';

    protected $fillable = ['name', 'directory'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }


    /**
     * @return string
     */
    public function getPathAttribute()
    {
        return asset($this->directory . '/' . $this->name);
    }
}
