<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\SatuanFactory;

class Lembaga extends Model
{
    use HasFactory;
    protected $connection = 'mysql_01';
    protected $table = 'lembaga';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;

    public function anggota()
    {
        return $this->hasMany(Anggota::class,'idlembaga','id');
    }
    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = [];

    // protected static function newFactory(): AnggotaFactory
    // {
    //     // return AnggotaFactory::new();
    // }
}
