<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'lastname',
        'address',
        'index',
        'confirm'
    ];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
