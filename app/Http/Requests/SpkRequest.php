<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\kriteria;

class SpkRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'kk_id' => 'required|unique:spks',
        ];
        $kriteria = Kriteria::all();

        foreach ($kriteria as $krit) {
            $rules['variabel_id.'.$krit->id] = 'required';
        }
        
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'kk_id.required' => 'Nomor KK harus diisi!',
        ];

        $kriteria = Kriteria::all();

        foreach ($kriteria as $krit) {
            $messages['variabel_id.'.$krit->id] = 'Kriteria harus dipilih!';
        }

        return $messages;
    }


}
