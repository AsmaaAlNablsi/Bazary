<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Http\Requests\UserRequests\UserIndexRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Validation\Validator;


class UsersController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:users', ['only' => ['index']]);
        $this->middleware('permission:users/create', ['only' => ['store']]);
        $this->middleware('permission:users/update', ['only' => ['update']]);
        $this->middleware('permission:users/details', ['only' => ['show']]);
        $this->middleware('permission:users/delete', ['only' => ['destroy']]);
        $this->middleware('permission:users/toggle-activation', ['only' => ['toggleActivation']]);
    }

    /**
     * @param UserIndexRequest $request
     * @return UserResource
     */
    public function index(UserIndexRequest $request): UserResource
    {
        /**
         * the second param stands for columns, so we can cast what's needed
         * in the model and call it here
         */
        $query = User::query();
        $query = self::generalSearch(new User(), $query, $request);
        return new UserResource($query->paginate($request->limit, ['*'], 'page', $request->offset));
    }

    /**
     * @param StoreUserRequest $request
     * @return UserResource
     */
    public function store(StoreUserRequest $request): UserResource
    {
        return new UserResource(User::add($request));
    }

    /**
     * @param User $user
     * @return false|string
     */
    function show(User $user)
    {
        return self::jsonResponse('success', ['user' => $user, 'roles' => $user->roles->pluck('name')]);
    }

    /**
     * @param UpdateUserRequest $request
     * @return false|string
     */

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->edit($request);
        return self::jsonResponse('success', $user);
    }

    /**
     * @param User $user
     * @return false|string
     */
    public function destroy(User $user)
    {
        $user->delete();
        return self::jsonResponse('success');
    }

    /**
     * @param User $user
     * @return false|string
     */
    public function toggleActivation(User $user)
    {
        $user->toggleActivation();
        return self::jsonResponse('success', $user);
    }
}
