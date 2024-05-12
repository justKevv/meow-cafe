<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja';

    public $timestamps = false;

    protected $primaryKey = 'no_meja';

    protected $guarded = ['no_meja'];

    public function order() {
        return $this->hasMany(Order::class);
    }
}
