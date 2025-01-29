<?php

namespace App\Models;

use App\Http\Requests\UserRequests\StoreUserRequest;
use App\Http\Requests\UserRequests\UpdateUserRequest;
use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles, BaseTrait, SoftDeletes, HasFactory;

    protected $guard_name = 'web';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'is_active',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * @param StoreUserRequest $request
     * @return User
     */
    public static function add(StoreUserRequest $request): User
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user->syncRoles($request->roles);
            DB::commit();
            return $user;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param UpdateUserRequest $request
     * @return bool
     */
    public function edit(UpdateUserRequest $request): bool
    {
        DB::beginTransaction();
        try {
            $this->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => ($request->password) ? Hash::make($request->password) : $this->password
            ]);
            $this->syncRoles($request->roles);
            DB::commit();
            return true;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @return string
     */
    public function token(): string
    {
        $signedUser = auth()->user();
        $signedUser->tokens()->delete();
        $token = $signedUser->createToken($signedUser->first_name);
        return $token->plainTextToken;
    }

    /**
     * @return array
     */
    public function tokenize(): array
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'accessToken' => $this->token(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ];
    }

    /**
     * @return void
     */
    public static function logout(): void
    {
        auth()->user()->tokens()->delete();
    }

    /**
     * @return bool
     */
    public function toggleActivation(): bool
    {
        return $this->update(['is_active' => !$this->is_active]);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
