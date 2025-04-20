<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\SeksiFactory;

class Seksi extends Model
{
    protected $connection = 'mysql_01';
    protected $table = 'seksi';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = [];
    public function ruang()
    {
        return $this->hasMany(Ruang::class,'idseksi','id');
    }

    public function barangruang()
    {
        return $this->hasMany(Barangruang::class,'idseksi','id');
    }

    public function stok()
    {
        return $this->hasMany(Stok::class,'idseksi','id');
    }
    public function stokfifo()
    {
        return $this->hasMany(Stokfifo::class,'idseksi','id');
    }
    public function stoklifo()
    {
        return $this->hasMany(Stoklifo::class,'idseksi','id');
    }
    public function stokmova()
    {
        return $this->hasMany(Stokmova::class,'idseksi','id');
    }


}