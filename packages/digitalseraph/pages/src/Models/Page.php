<?php

namespace DigitalSeraph\Pages\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'sub_title', 'body', 
        'active', 'parent_id', 'priority', 
        'created_by', 'modified_by'
    ];
}
