<?php

namespace Models;
use Illuminate\Database\Eloquent\Model;

class Lugar extends Model
{
    protected $table = 'places';
    public $timestamps = false;

    public function getCity($id) {
        return Lugar::where('id', $id)->first();
    }

    public function getId($city) {
        return Lugar::where('nombre', $city)->first();
    }

}   