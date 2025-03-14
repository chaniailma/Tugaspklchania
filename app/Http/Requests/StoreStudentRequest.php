<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name'   => 'required',
            'email'  => 'required|email|unique:students',
            'phone'  => 'required',
            'class'  => 'required',
            'address' => 'required',
            'gender'  => 'required',
            'status'  => 'required',
            'photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

    }
    
    public function messages()
    {
        return [
    'name.required' => 'Nama wajib diisi.',
    'name.regex' => 'Nama hanya boleh berisi huruf.',
    'email.required' => 'Email wajib diisi.',
    'email.email' => 'Format email tidak valid.',
    'email.unique' => 'Email sudah digunakan.',
    'phone.required' => 'Nomor telepon wajib diisi.',
    'phone.numeric' => 'Nomor telepon harus berupa angka.',
    'phone.digits_between' => 'Nomor telepon harus memiliki 10 hingga 15 digit.',
    'class.required' => 'Kelas wajib diisi.',
    'address.required' => 'Alamat wajib diisi.',
    'address.min' => 'Alamat minimal harus 5 karakter.',
    'gender.required' => 'Jenis kelamin wajib diisi.',
    'gender.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
    'status.required' => 'Status wajib diisi.',
    'status.in' => 'Status harus Aktif atau Tidak Aktif.',
    'photo.image' => 'Foto harus berupa gambar.',
    'photo.mimes' => 'Format foto harus jpeg, png, jpg, atau gif.',
    'photo.max' => 'Ukuran foto maksimal 2MB.',
];
    }
}
