<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table ='categories';

    protected $fillable =[
        'title',
        'image',
        'status'
    ];
    //================================================
    //==================Relations====================

    public function blogs(){
       return $this->hasMany(Blog::class,'category_id','id');
    }

    //=======================Accessory==================
    //==================================================

    public function getStatusAttribute($value)
    {
        if ($value == 1) {
            return 'Active';
        } else if ($value == 2) {
            return 'Inactive';
        }
    }
}
