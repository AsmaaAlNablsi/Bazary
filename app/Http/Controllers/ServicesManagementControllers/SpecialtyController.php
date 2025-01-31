<?php

namespace App\Http\Controllers\ServicesManagementControllers;

use App\Models\Specialty;
use App\Http\Requests\SpecialtyRequests\StoreSpecialtyRequest;
use App\Http\Requests\SpecialtyRequests\UpdateSpecialtyRequest;
use App\Http\Resources\SpecialtyResource;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialtyRequests\SpecialtyIndexRequest;

class SpecialtyController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:specialties', ['only' => ['index']]);
        $this->middleware('permission:specialties/create', ['only' => ['store']]);
        $this->middleware('permission:specialties/update', ['only' => ['update']]);
        $this->middleware('permission:specialties/details', ['only' => ['show']]);
        $this->middleware('permission:specialties/delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(SpecialtyIndexRequest $request)
    {
        $query = Specialty::query();
        $query = self::generalSearch(new Specialty(), $query, $request);

        return SpecialtyResource::collection($query->paginate($request->limit, ['*'], 'page', $request->offset));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialtyRequest $request)
    {
        $specialty = Specialty::create($request->all());
        return self::jsonResponse('success', $specialty);
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialty $specialty)
    {
        return self::jsonResponse('success', $specialty);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $specialty->update($request->all());
        return self::jsonResponse('success', $specialty);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        if($specialty->hasRelations())
            throw ValidationException::withMessages(['id' => trans('validation.has_relations')]);
        $specialty->delete();
        return self::jsonResponse('success');
    }
}
