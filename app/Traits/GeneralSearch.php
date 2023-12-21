<?php

namespace App\Traits;
use Illuminate\Support\Facades\Schema;

trait GeneralSearch
{

    public function generalSearch($model_name, $query, $request,$table_name='')
    {

        if (isset($request->search) && $request->search !="undefined") {
            $columns = Schema::getColumnListing(($model_name)->getTable());
            $query->where(function ($query) use ($columns, $request,$table_name) {
                foreach ($columns as $column) {
                        $column = $table_name?$table_name.'.'.$column:$column;
                    $query->orWhere($column, 'like', "%{$request->search}%");
                }
            });
        }
        return $query;
    }

    public static function searchInAllColumns($query,$table_name,$request)
    {
        if (isset($request->search)) {
            $columns = Schema::getColumnListing($table_name);
            $query->where(function ($query) use ($columns, $request, $table_name) {
                foreach ($columns as $column) {
                    $column = $table_name ? $table_name . '.' . $column : $column;
                    $query->orWhere($column, 'like', "%{$request->search}%");
                }
            });
        }
    }

}
