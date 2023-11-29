<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeverageType extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'beverage_types';
    protected $guarded = [];
    public function beverages(){
        return $this->hasMany(Beverage::class,"beverage_type_id","id");
    }
}
