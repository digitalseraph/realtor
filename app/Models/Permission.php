<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Contracts\Permission as SpatiePermission;
use Spatie\Permission\Models\Permission as SpatiePermissionModel;

class Permission extends SpatiePermissionModel implements SpatiePermission
{

}
