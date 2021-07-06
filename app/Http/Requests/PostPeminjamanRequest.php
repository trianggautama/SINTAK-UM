<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPeminjamanRequest extends FormRequest
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
        return [
            'buku_id'            => ['required'],
            'nama'               => ['required'],
            'no_hp'              => ['required'],
            'jumlah'             => ['required','numeric'],
            'tgl_peminjaman'     => ['required']
        ];
    }
}
