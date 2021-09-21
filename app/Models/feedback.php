<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    protected $table ='feedback';
    protected $primaryKey = 'FeedbackID';
    protected $fillable = [
        'Cus_ID',
        'ContractNo',
        'DriverAttitude',
        'Punctuality',
        'ReasonalPrice',
        'Comment',
    ];
   
}
