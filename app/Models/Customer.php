<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'user_id', 'type', 'rank', 'direct_id', 'phone_number1', 'notes', 'continue', 'admin_name',
    'direct_name', 'direct_standing', 'note', 'delegate_name'];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Direct()
    {
        return $this->belongsTo(Direct::class);
    }

    public function PhoneNumbers()
    {
        return $this->hasMany(Phone::class);
    }
    public function Phones()
    {
        return $this->hasMany(Phone::class);
    }
}
