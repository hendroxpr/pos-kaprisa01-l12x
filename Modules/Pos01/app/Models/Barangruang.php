<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\BarangruangFactory;

class Barangruang extends Model
{
    protected $connection = 'mysql_01';
    protected $table = 'barangruang';
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
        return $this->belongsTo(ruang::class,'idruang');
    }
    public function seksi()
    {
        return $this->belongsTo(Seksi::class,'idSeksi');
    }
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = [];
}