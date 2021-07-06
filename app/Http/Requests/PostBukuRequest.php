<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBukuRequest extends FormRequest
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
            'judul_buku'         => ['required'],
            'teu'                => ['required'],
            'penerbit'           => ['required'],
            'tahun_terbit'       => ['required','numeric'],
            'bahasa'             => ['required'],
            'jumlah'             => ['required','numeric'],
            'tipe_dokumen_id'    => ['required'],
        ];
    }
}
