<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menusub extends Model
{
    // use HasFactory;
    protected $connection = 'mysql_01';
    protected $table = 'submenu';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;

    public function menuutama()
    {
        return $this->belongsTo(Menuutama::class,'idmainmenu');
    }

    public function aplikasi()
    {
        return $this->belongsTo(Aplikasi::class,'idaplikasi');
    }
    
}
