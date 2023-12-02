<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionHeader extends Model
{
    use HasFactory, Timestamp;
    protected $guarded = [];


    public function  user(){
        return $this->belongsTo(User::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class);
    }
   
}
