<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'header_title',
        'header_description',
        'header_image',
        'about_us_title',
        'about_us_description',
        'about_us_image1',
        'about_us_image2',
        'join_team_link',
        'email',
        'phone',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
    ];
}
