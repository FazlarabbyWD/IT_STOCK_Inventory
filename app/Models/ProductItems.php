<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    protected $table ='product_items';
    public $timestamps = false;

    public function productInfo(){
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function specTypeInfo(){
        return $this->hasOne('App\Models\SpecTypes', 'id', 'spec_type_id');
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
