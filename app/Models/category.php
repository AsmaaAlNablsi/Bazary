<?php

namespace App\Models;


use App\Http\Requests\CategoryRequests\StoreCategoryRequest;
use App\Http\Requests\CategoryRequests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Laravel\Scout\Searchable;

class category extends BaseModel
{
    use  Searchable;

    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name_ar',
        'name_en',
    ];

    public static function add(StoreCategoryRequest $request): Category
    {
        DB::beginTransaction();
        try {
            $user = Category::create([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
            ]);
            DB::commit();
            return $user;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }



    public function edit(UpdateCategoryRequest $request): bool
    {
        DB::beginTransaction();
        try {
            $this->update([
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
            ]);
            DB::commit();
            return true;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }



    /**
     * Define search keys
     *
     * @return array
     */
    public function toSearchableArray(): array
    {
        return [
            'name_ar' => '',
            'name_en' => '',
        ];
    }
}
