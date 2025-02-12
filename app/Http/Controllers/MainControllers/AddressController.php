<?php

namespace App\Http\Controllers\MainControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequests\AddressIndexRequest;
use App\Http\Requests\AddressRequests\StoreAddressRequest;
use App\Http\Requests\AddressRequests\UpdateAddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Validation\ValidationException;

class AddressController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:addresses', ['only' => ['index']]);
        $this->middleware('permission:addresses/create', ['only' => ['store']]);
        $this->middleware('permission:addresses/update', ['only' => ['update']]);
        $this->middleware('permission:addresses/details', ['only' => ['show']]);
        $this->middleware('permission:addresses/delete', ['only' => ['destroy']]);
        $this->middleware('permission:addresses/toggle-activation', ['only' => ['toggleActivation']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(AddressIndexRequest $request)
    {
        $query = Address::search($request->search);
        if (!$request->parent_id)
            $query = $query->query(function ($subQuery) {
                $subQuery->whereNull('parent_id');
            });
        else
            $query->query(function ($subQuery) use ($request) {
                $subQuery->where('parent_id', $request->parent_id);
            });

        $addresses = $query->paginate($request->limit, 'page', $request->offset);
        $parent = Address::find($request->parent_id);

        return (new AddressResource($addresses))->additional(['parentData' => $parent]);
    }

    /**
     * @param StoreAddressRequest $request
     * @return false|string
     */
    public function store(StoreAddressRequest $request)
    {
        $address = Address::create($request->all());
        return self::jsonResponse('success', $address);
    }

    /***
     * @param Address $address
     * @return false|string
     */
    public function show(Address $address)
    {
        return self::jsonResponse('success', $address);
    }

    /**
     * @param UpdateAddressRequest $request
     * @param Address $address
     * @return false|string
     */
    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address->update($request->all());
        return self::jsonResponse('success', $address->refresh());
    }

    /***
     * @param Address $address
     * @return false|string
     */
    public function destroy(Address $address)
    {
        if ($address->hasRelations())
            throw ValidationException::withMessages(['id' => trans('validation.has_relations')]);
        $address->delete();
        return self::jsonResponse('success');
    }

    /**
     * @param Address $address
     * @return false|string
     */
    public function toggleActivation(Address $address)
    {
        $address->toggleActivation();
        return self::jsonResponse('success', $address);
    }
}
