<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }
    
}
