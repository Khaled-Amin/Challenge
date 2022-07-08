<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $guarded = [];
    protected $fillable  = ['unit_name'  , 'parent_id' , 'scale'];


    public function subunits(){
        return $this->hasMany(Unit::class,'parent_id');
    }
    public function parent(){
        return $this->belongsTo(Unit::class , 'parent_id');

    }
    public function products(){
        return $this->hasMany(Product::class);
    }

}
