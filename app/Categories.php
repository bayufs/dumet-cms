<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [
        'category_name',
        'icon'
    ];

    /**  relasi on to many ke model article karena 1 category 
    dapat di miliki banyak article
     */
    public function article()
    {
        return $this->hasMany(Articles::class);
    }
    
}
