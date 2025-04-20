<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\KategoriFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $connection = 'mysql_01';
    protected $table = 'kategori';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;

    public function barang()
    {
        return $this->hasMany(Barang::class,'idkategori','id');
    }
    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = [];

    // protected static function newFactory(): KategoriFactory
    // {
    //     // return KategoriFactory::new();
    // }
}
