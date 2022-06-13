<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airwaybill extends Model
{
    use HasFactory;
    protected $primaryKey = 'awb_id';
    protected $keyType = 'string';
}
