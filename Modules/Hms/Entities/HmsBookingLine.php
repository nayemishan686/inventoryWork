<?php

namespace Modules\Hms\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HmsBookingLine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
}
