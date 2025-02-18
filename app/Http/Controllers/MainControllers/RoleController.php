<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequests\RoleIndexRequest;
use App\Http\Requests\RoleRequests\StoreRoleRequest;
use App\Http\Requests\RoleRequests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Validation\ValidationException;


class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:roles', ['only' => ['index']]);
        $this->middleware('permission:roles/create', ['only' => ['store']]);
        $this->middleware('permission:roles/update', ['only' => ['update']]);
        $this->middleware('permission:roles/details', ['only' => ['show']]);
        $this->middleware('permission:roles/delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     */
    public function index(RoleIndexRequest $request)
    {
        $query = Role::search($request->search);
        if ($request->parent_id)
            $query = $query->query(function ($subQuery) use ($request) {
                $subQuery->join('model_has_roles', 'model_has_roles.role_id', 'roles.id')
                    ->whereModelId($request->parent_id);
            });
        return new RoleResource($query->paginate($request->limit, 'page', $request->offset));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::add($request);
        return self::jsonResponse('success', $role);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return self::jsonResponse('success',[ 'role' => $role, 'permissions' => $role->permissions->pluck('name')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->edit($request);
        return self::jsonResponse('success', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        if ($role->hasRelations())
            throw ValidationException::withMessages(['id' => trans('validation.has_relations')]);
        $role->delete();
        return self::jsonResponse('success');
    }
}
