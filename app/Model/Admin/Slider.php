<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'slider_image','publication_status',
    ];
}
