<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [
        'article_id',
        'reply',
        'avatar'
    ];
}
