<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	protected $table  = 'landing_pages';

    protected $fillable = [
        'title', 'description', 'subtitle', 'category', 'image'
    ];
}
