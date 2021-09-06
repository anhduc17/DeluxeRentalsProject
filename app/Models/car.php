<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $primaryKey = 'CarID';
    protected $fillable = [
        'CarPlate',
        'CarPrice',
        'CarType',
        'CarBrand',
        'CarPic',
    ];

}
