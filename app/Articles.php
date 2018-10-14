<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_id',
        'title_post',
        'images',
        'news',
        'alt',
        'focus_key',
        'description'
    ];

    /**  relasi on to many ke model comment karena 1 article 
    dapat di miliki banyak comment
     */
    public function comment()
    {
        return $this->hasMany(Comments::class);
    }

    public function tag()
    {
        return $this->belongsToMany(Tags::class);
    }
}
