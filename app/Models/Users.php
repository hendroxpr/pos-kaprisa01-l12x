<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $connection = 'mysql_01';
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $guarded = [];
    public $timestamps = false;
    public $incrementing = false;

    public function aplikasi()
    {
        return $this->belongsTo(Aplikasi::class,'kunci1');
    }
    
}
