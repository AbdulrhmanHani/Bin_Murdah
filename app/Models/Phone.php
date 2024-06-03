<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'phone_number1', 'phone_number2', 'phone_number3'];

    public function Customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
