<?php

namespace App\Models;

use App\Models\User;
use App\Models\Navigation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lists extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'title',
        'description',
        'img_path',
        'user_id',
        
    ];

    public function user()
    {   
        return $this->belongsTo(User::class);
    }

    public function navigations()
    {
        return $this->hasMany(Navigation::class);
    }
}
