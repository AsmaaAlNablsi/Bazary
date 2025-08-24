<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequests\LocationIndexRequest;
use App\Http\Requests\LocationRequests\StoreLocationRequest;
use App\Http\Requests\LocationRequests\UpdateLocationRequest;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use App\Models\Protocol;
use Illuminate\Validation\ValidationException;

class LocationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:locations', ['only' => ['index']]);
//        $this->middleware('permission:locations/create', ['only' => ['store']]);
        $this->middleware('permission:locations/update', ['only' => ['update']]);
        $this->middleware('permission:locations/details', ['only' => ['show']]);
        $this->middleware('permission:locations/delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(LocationIndexRequest $request)
    {
        $query = Location::search($request->search);
        if (!$request->parent_id)
            $query = $query->query(function ($subQuery) {
                $subQuery->whereNull('parent_id');
            });
        else
            $query->query(function ($subQuery) use ($request) {
                $subQuery->where('parent_id', $request->parent_id);
            });

        $locations = $query->paginate($request->limit, 'page', $request->offset);
        $parent = Location::find($request->parent_id);

        return (new LocationResource($locations))->additional(['parentData' => $parent]);
    }

//    /**
//     * @param StoreLocationRequest $request
//     * @return false|string
//     */
//    public function store(StoreLocationRequest $request)
//    {
//        $location = Location::create($request->all());
//        return self::jsonResponse('success', $location);
//    }

    /***
     * @param Location $location
     * @return false|string
     */
    public function show(Location $location)
    {
        return self::jsonResponse('success', $location);
    }

    /**
     * @param UpdateLocationRequest $request
     * @param Location $location
     * @return false|string
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->all());
        return self::jsonResponse('success', $location->refresh());
    }

    /***
     * @param Location $location
     * @return false|string
     */
    public function destroy(Location $location)
    {
        if ($location->hasRelations())
            throw ValidationException::withMessages(['id' => trans('validation.has_relations')]);
        $location->delete();
        return self::jsonResponse('success');
    }

    /**
     * @return false|string
     *
     */
    public function getAutoLocations()
    {
        $addresses = Location::whereNull('parent_id')
            ->select('id', 'name')
            ->get()
            ->toArray();

        return self::jsonResponse('success', $addresses);
    }



}
