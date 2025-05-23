<?php

namespace Modules\Pos01\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pos01\Database\Factories\SavingsFactory;

class Savings extends Model
{
    protected $connection = 'mysql_01';
    protected $table = 'savings';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;
    
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