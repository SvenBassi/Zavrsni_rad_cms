<?php

namespace App\Models;

use App\Models\Lists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Navigation extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'lists',
    ];

    public function page(){
        $this->belongsTo(Lists::class);
    }
}
