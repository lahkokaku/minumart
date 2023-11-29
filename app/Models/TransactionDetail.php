<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function beverage(){
        return $this->belongsTo(Beverage::class);
    }

    public function transactionHeader(){
        return $this->belongsTo(TransactionHeader::class);
    } 
}
