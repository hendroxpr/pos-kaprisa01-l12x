<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\BarangFactory;

class Barang extends Model
{
    protected $connection = 'mysql_01';
    protected $table = 'barang';
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
    public function satuan()
    {
        return $this->belongsTo(Satuan::class,'idsatuan');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'idkategori');
    }

    public function barangruang()
    {
        return $this->hasMany(Barangruang::class,'idbarang','id');
    }
    public function barcode()
    {
        return $this->hasMany(Barcode::class,'idbarang','id');
    }
    public function stok()
    {
        return $this->hasMany(Stok::class,'idbarang','id');
    }
    public function stokfifo()
    {
        return $this->hasMany(Stokfifo::class,'idbarang','id');
    }
    public function stoklifo()
    {
        return $this->hasMany(Stoklifo::class,'idbarang','id');
    }
    public function stokmova()
    {
        return $this->hasMany(Stokmova::class,'idbarang','id');
    }
    public function bmasuk()
    {
        return $this->hasMany(Bmasuk::class,'idbarang','id');
    }
    public function bkeluar()
    {
        return $this->hasMany(Bkeluar::class,'idbarang','id');
    }


}