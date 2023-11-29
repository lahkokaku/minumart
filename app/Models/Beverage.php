<?php

namespace App\Models;

use App\Models\Outlet;
use App\Models\BeverageType;
use App\Models\TransactionDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beverage extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $table = "beverages";
    protected $guarded =[];

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }

    public function beverageType(){
        return $this->belongsTo(BeverageType::class);
    }

    public function transactionDetail (){
        return $this->hasOne(TransactionDetail::class);
    }
}
