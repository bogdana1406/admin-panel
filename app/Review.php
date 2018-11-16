<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'customer_name',
        'published_at',
        'text_review',
        'customer_link',
        'customer_photo',
        'mark_review'
    ];
}
