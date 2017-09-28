<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address1', 'address2', 'city', 'state', 'zip',
        'description', 'neighborhood',
        'payment_monthly', 'payment_mortgage_total',
        'property_type_id',
    ];


    /**
     * Get the property type associated with the property.
     */
    public function propertyType()
    {
        return $this->hasOne('App\Models\PropertyType');
    }


    /**
     * Get the property images for the property
     */
    public function propertyImages()
    {
        return $this->hasMany('App\Models\PropertyImages');
    }
}
