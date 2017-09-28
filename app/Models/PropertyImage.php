<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'priority', 'url', 'property_id',
    ];

    /**
     * Get the property associated with the property image.
     */
    public function property()
    {
        return $this->hasOne('App\Models\Property');
    }
}
