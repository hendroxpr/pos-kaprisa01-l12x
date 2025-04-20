<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menuutama extends Model
{
    // use HasFactory;
    protected $connection = 'mysql_01';
    protected $table = 'mainmenu';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;

    public function menusub()
    {
        return $this->hasMany(Menusub::class, 'idmainmenu');
    }
}
