<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function beverages(){
        return $this->hasMany(Beverage::class,"outlet_id","id");
    }
}
