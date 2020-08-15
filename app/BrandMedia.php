<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandMedia extends Model
{
    //
    protected $hidden = [
        'deleted_at', 'created_at', 'updated_at'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand', 'id');
    }
}
