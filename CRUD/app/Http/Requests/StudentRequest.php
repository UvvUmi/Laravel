<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidateIdNumber;
use Illuminate\Http\Request;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'city_id' => 'required|exists:cities,id',
            'group_id' => 'required|exists:groups,id',
            'birth_date' => 'required|date',
            'gender'=> 'required|string|max:1',
            'personal_number' => ['required', new ValidateIdNumber($request->birth_date, $request->gender)]
        ];
    }

    // public function messages(): array
    // {        
    //     return [
    //         'name' => 'required|string|max:255',
    //         'surname' => 'required|string|max:255',
    //         'address' => 'required|string',
    //         'phone' => 'required|string|max:20',
    //         'city_id' => 'required|exists:cities,id',
    //         'group_id' => 'required|exists:groups,id',
    //         'birth_date' => 'required|date',
    //         'gender'=> 'required|string|max:1',
    //     ];
    // }
}
