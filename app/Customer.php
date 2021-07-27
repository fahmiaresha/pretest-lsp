<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $table='customer';
    protected $primaryKey ='ID_CUSTOMER';
    public $timestamps=false;
    // protected $guarded = [];

    protected $fillable = [
    'nama_customer','alamat_customer','kota_customer','email_customer','hp_customer','perusahaan_customer'
    ];
}
