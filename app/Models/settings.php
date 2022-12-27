<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'phone',
        'phone_two',
        'phone_three',
        'email',
        'email_two',
        'fb_link',
        'twitter_link',
        'youtube_link',
        'insta_link',
        'copyright',
        'logo',
        'favicon',
        'currency',
        'bkash',
        'fb_pixel',
        'about_us',
        'delivery_policy',
        'return_policy',
        'google_sheet',


    ];
}
