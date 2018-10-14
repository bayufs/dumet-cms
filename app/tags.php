<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [
        'tag_name',
    ];

    public function article()
    {
        return $this->belongsToMany(Articles::class);
    }
}
