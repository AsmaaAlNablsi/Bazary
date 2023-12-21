<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralCodeRequests\GeneralCodeIndexRequest;
use App\Http\Requests\GeneralCodeRequests\StoreGeneralCodeRequest;
use App\Http\Requests\GeneralCodeRequests\UpdateGeneralCodeRequest;
use App\Http\Resources\GeneralCodeResource;
use App\Models\GeneralCode;
use Illuminate\Validation\ValidationException;

class GeneralCodeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:general-codes', ['only' => ['index']]);
        $this->middleware('permission:general-codes/create', ['only' => ['store']]);
        $this->middleware('permission:general-codes/update', ['only' => ['update']]);
        $this->middleware('permission:general-codes/details', ['only' => ['show']]);
        $this->middleware('permission:general-codes/delete', ['only' => ['destroy']]);
        $this->middleware('permission:general-codes/toggle-activation', ['only' => ['toggleActivation']]);
    }
    /**
     * @param GeneralCodeIndexRequest $request
     * @return GeneralCodeResource
     */
    public function index(GeneralCodeIndexRequest $request): GeneralCodeResource
    {
        $generalCodes = GeneralCode::query();
        if (is_null($request->parent_id))
            $generalCodes = $generalCodes->whereNull('parent_id');
        else
            $generalCodes = $generalCodes->where('parent_id', $request->parent_id);

        $generalCodes = self::generalSearch(new GeneralCode(), $generalCodes, $request);
        $generalCodes = $generalCodes->paginate($request->limit, ['*'], 'page', $request->offset);
        $parent = GeneralCode::find($request->parent_id);

        return (new GeneralCodeResource($generalCodes))->additional(['parentData' => $parent]);
    }

    /**
     * @param StoreGeneralCodeRequest $request
     * @return false|string
     */
    public function store(StoreGeneralCodeRequest $request): false|string
    {
        $generalCode = GeneralCode::create($request->all());
        return self::jsonResponse('success', $generalCode);
    }

    /**
     * @param GeneralCode $generalCode
     * @return false|string
     */
    public function show(GeneralCode $generalCode): false|string
    {
        return self::jsonResponse('success', $generalCode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeneralCodeRequest $request, GeneralCode $generalCode): false|string
    {
        $generalCode->update($request->all());
        return self::jsonResponse('success', $generalCode);
    }

    /**
     * @param GeneralCode $generalCode
     * @return false|string
     */
    public function destroy(GeneralCode $generalCode): false|string
    {
        if($generalCode->hasRelations())
            throw ValidationException::withMessages(['id' => trans('validation.has_relations')]);
        $generalCode->delete();
        return self::jsonResponse('success');
    }

    /**
     * @param GeneralCode $generalCode
     * @return false|string
     */
    public function toggleActivation(GeneralCode $generalCode): false|string
    {
        $generalCode->toggleActivation();
        return self::jsonResponse('success', $generalCode);
    }

    /**
     * @param string $code
     * @return false|string
     */
    public function codes(string $code): false|string
    {
        return self::jsonResponse('success', GeneralCode::query()->select('general_codes.*')
            ->join('general_codes as parent', 'general_codes.parent_id', 'parent.id')
            ->where('parent.code', $code)->get());
    }
}
