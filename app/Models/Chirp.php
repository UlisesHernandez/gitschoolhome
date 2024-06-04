<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    use HasFactory;
    protected $fillable =[
        'message',
    ];

    //referencia 1 a la relacion cada chirp pertenece a un usuario user
    public function user():BelongsTo
    {
       return $this->belongsTo(User::class);
    }

}
