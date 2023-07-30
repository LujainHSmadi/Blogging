<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'user_id',
        'category_id',
        'title',
        'description',
        'status',
        'image',
    ];
    //===============================================
    //================Relations======================
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');

    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');

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
