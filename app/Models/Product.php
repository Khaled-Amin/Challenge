<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guarded = [];

    protected $fillable  = ['name' , 'amount_liter' , 'amount_milliliter' , 'unit_id' , 'total_quantities_liter' , 'total_quantities_milliliter'];


    public function units(){
        return $this->belongsTo(Unit::class , 'unit_id');
    }


}
