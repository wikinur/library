<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'phone_number', 'address', 'email', 'date_entry'];

    public function user()
    {
        return $this->hasOne(User::class, 'member_id', 'id');
    }
}
