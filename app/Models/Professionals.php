<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionals extends Model
{
    use HasFactory;

    protected $table = 'professionals';

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
