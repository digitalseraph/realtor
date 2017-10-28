<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * TODO:
 *     add functionality to class
 */
class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'sub_title',
        'body',
        'link_text',
        'link_description',
        'active',
        'priority',
        'created_by',
        'modified_by'
    ];

    /**
     * Check if active
     *
     * @return boolean
     */
    public function isActive()
    {
        return ($this->active) ? 'true' : 'false';
    }


    /**
     * Get the user that created the page.
     */
    public function createdBy()
    {
        return $this->hasOne('App\Admin', 'id', 'created_by');
    }

    /**
     * Get the user that last modified the page.
     */
    public function modifiedBy()
    {
        return $this->hasOne('App\Admin', 'id', 'modified_by');
    }
}
