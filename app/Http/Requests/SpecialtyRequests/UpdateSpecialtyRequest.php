<?php

namespace App\Http\Requests\SpecialtyRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSpecialtyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => ['required', 'string', 'max:50',
            Rule::unique('specialties','name_ar')->whereNull('deleted_at')->ignore($this->specialty)],

            'name_en' => ['required', 'string', 'max:50',
            Rule::unique('specialties','name_en')->whereNull('deleted_at')->ignore($this->specialty)],

            'code'=>['sometimes','string','max:50', 
            Rule::unique('specialties','code')->whereNull('deleted_at')->ignore($this->specialty)],
            
            'details_ar'=>['nullable','string'],
            'details_en'=>['nullable','string'],
        ];
    }
}
