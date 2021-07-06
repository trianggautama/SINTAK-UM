<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Peminjaman extends Model
{
    use HasFactory,Uuid;

    protected $table = 'peminjaman';

    protected $guarded = ['id'];
    protected $keyType = 'string';
    protected $primaryKey = 'uuid';

    public function Buku() 
    {
        return $this->belongsto('App\Models\Buku','buku_id','id');
    }
}
