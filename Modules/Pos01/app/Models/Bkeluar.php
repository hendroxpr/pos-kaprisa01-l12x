<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\BkeluarFactory;

class Bkeluar extends Model
{
    protected $connection = 'mysql_01';
    protected $table = 'bkeluar';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;
    
    public function barang()
    {
        return $this->belongsTo(Barang::class,'idbarang');
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class,'idruang');
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class,'idanggota');
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = [];
}