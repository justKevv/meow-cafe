<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'id_order';

    public $timestamps = false;

    protected $guarded = ['id_order'];
    protected $dates = ['tgl_order'];

    public function setTglOrderAttribute($value)
    {
        $this->attributes['tgl_order'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function menu() {
        return $this->belongsTo(Menu::class, 'id_menu');
    }

    public function meja() {
        return $this->belongsTo(Meja::class);
    }
    
    public function bill() {
        return $this->hasOne(Bill::class);
    }

}
