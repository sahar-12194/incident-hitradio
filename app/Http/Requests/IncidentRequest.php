<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'heure_started' => 'required',
            'heure_end'  => 'required',
            'type_panne' => 'required',
            'action'     => 'required',
            'inpact'     => 'required',
            'status'     => 'required',
            'entity_id'  => 'required',
            'obsevation' => 'nullable',
        ];
    }
}
