<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerusahaanStoreRequest extends FormRequest
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
        if(request()->isMethod('post')){
            return [
                'nama_perusahaan'=>'required|string|max:255',
                'logo_perusahaan'=>'required|string',
                'alamat_perusahaan'=>'required|string',
                'kontak_perusahaan'=>'required|numeric'
            ];
        }
        else{
            return[
                'nama_perusahaan'=>'required|string|max:255',
                'logo_perusahaan'=>'required|string',
                'alamat_perusahaan'=>'required|string',
                'kontak_perusahaan'=>'required|numeric'
            ];
        }
    }
    public function messages(): array
    {
        if(request()->isMethod('post')){
            return [
                'nama_perusahaan.required'=>'Nama perusahaan Wajib diisi',
                'logo_perusahaan.required'=>'Logo perusahaan Wajib diisi',
                'alamat_perusahaan.required'=>'Alamat perusahaan Wajib diisi',
                'kontak_perusahaan.required'=>'Kontak perusahaan Wajib diisi'
            ];
        }
        else{
            return[
                'nama_perusahaan.required'=>'Nama perusahaan Wajib diisi',
                'logo_perusahaan.required'=>'Logo perusahaan Wajib diisi',
                'alamat_perusahaan.required'=>'Alamat perusahaan Wajib diisi',
                'kontak_perusahaan.required'=>'Kontak perusahaan Wajib diisi'
            ];
        }
    }


}
