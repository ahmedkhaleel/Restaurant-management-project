<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;



    public function saleDetails(){
    return $this->hasMany(SaleDetail::class);
}
}
