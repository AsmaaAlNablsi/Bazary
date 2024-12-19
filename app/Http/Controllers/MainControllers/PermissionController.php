<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequests\IndexPermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permissions', ['only' => ['index']]);
    }

    public function index(IndexPermissionRequest $request)
    {
        $query = Permission::query();
        if ($request->parent_id)
            $query = $query->join('role_has_permissions', 'role_has_permissions.permission_id', 'permissions.id')
                ->whereRoleId($request->parent_id);

        $query = self::generalSearch(new Permission(), $query, $request);

        return new PermissionResource($query->paginate($request->limit, ['*'], 'page', $request->offset));
    }
}
