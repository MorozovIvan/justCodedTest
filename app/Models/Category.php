<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'parent_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }


    /**
     * @param $id
     */
    public function setParentIdAttribute($id)
    {
        $this->attributes['parent_id'] = is_numeric($id) ? $id : null;
    }
}
