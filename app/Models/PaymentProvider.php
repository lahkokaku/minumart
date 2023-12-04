<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    use HasFactory;
    public $fillable = [
        'type',
        'name',
    ];

    public function transactionHeader(){
        return $this->hasMany(TransactionHeader::class);
    }
}
