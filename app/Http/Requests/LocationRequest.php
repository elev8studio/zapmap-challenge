<?php

namespace App\Http\Requests;

use App\Rules\LatitudeRule;
use App\Rules\LongitudeRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'radius' => 'required|numeric',
            'latitude' => ['required', new LatitudeRule()],
            'longitude' => ['required', new LongitudeRule()],
        ];
    }

    /**
     * Merge query parameters into request for validation.
     *
     * @return LocationRequest
     */
    protected function prepareForValidation(): LocationRequest
    {
        return $this->merge([
            'radius' => $this->query('radius'),
            'latitude' => $this->query('latitude'),
            'longitude' => $this->query('longitude'),
        ]);
    }
}
