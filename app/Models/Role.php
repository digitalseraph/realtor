<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Role as SpatieRole;
use Spatie\Permission\Models\Role as SpatieRoleModel;

class Role extends SpatieRoleModel implements SpatieRole
{
    //
}
