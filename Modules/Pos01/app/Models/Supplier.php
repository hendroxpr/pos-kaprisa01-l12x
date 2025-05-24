<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\SatuanFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $connection = 'mysql_01';
    protected $table = 'supplier';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     */
    // protected $fillable = [];

    // protected static function newFactory(): AnggotaFactory
    // {
    //     // return AnggotaFactory::new();
    // }
    public function bmasuk()
    {
        return $this->hasMany(Bmasuk::class,'idsupplier','id');
    }



}
