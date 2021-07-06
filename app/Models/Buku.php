<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Buku extends Model
{
    use HasFactory,Uuid;

    protected $guarded = ['id'];
    protected $keyType = 'string';
    protected $primaryKey = 'uuid';

    public function tipe_dokumen() 
    {
        return $this->belongsto('App\Models\Tipe_dokumen');
    }
}
