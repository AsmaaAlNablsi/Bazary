<?php

namespace App\Models;

use App\Http\Requests\RoleRequests\StoreRoleRequest;
use App\Http\Requests\RoleRequests\UpdateRoleRequest;
use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use SoftDeletes, BaseTrait;

    public $guard_name = 'web';

    protected $fillable = [
        'name',
        'name_ar',
        'is_active',
        'guard_name'
    ];

    public function hasRelations(): bool
    {
        if (sizeof($this->users))
            return true;
        return false;
    }

    public static function add(StoreRoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $role = Role::create($request->all());
            $role->syncPermissions($request->permissions);
            DB::commit();
            return $role;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    public function edit(UpdateRoleRequest $request)
    {
        DB::beginTransaction();
        try {
            $this->update($request->all());
            $this->syncPermissions($request->permissions);
            DB::commit();
            return true;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
