<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'isRental', 'isMortgage',
    ];

    /**
     * Get the properties for the property type
     */
    public function properties()
    {
        return $this->hasMany('App\Models\Property');
    }
}
