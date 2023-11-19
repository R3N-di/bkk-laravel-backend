<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LowonganRequest extends FormRequest
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
            'id_perusahaan' => 'required',
            'tanggal_tutup' => 'required',
            'gambar' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute harus diisi',
        ];
    }

    public function attributes(): array
    {
        return [
            'id_perusahaan' => 'Perusahaan',
            'tanggal_tutup' => 'Tanggal Tutup',
            'gambar' => 'Gambar',
        ];
    }
}
