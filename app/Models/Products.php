<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';
    public $timestamps = false;

    public function categoryInfo(){
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }

    public function brandInfo(){
        return $this->hasOne('App\Models\Brands', 'id', 'brand_id');
    }

    public function companyInfo(){
    	return $this->hasOne('App\Models\Companies', 'id', 'company_id');
    }

    public function createdBy(){
    	return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function updatedBy(){
    	return $this->hasOne('App\Models\User', 'id', 'updated_by');
    }
}
