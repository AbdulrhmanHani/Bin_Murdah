<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direct extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'standing'];

    public function Customers() #makanet al mobasher
    {
        return $this->hasMany(Customer::class);
    }

    public function PhoneNumbers()
    {
        return $this->hasMany(Phone_Number::class);
    }

}
