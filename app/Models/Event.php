<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = ['description', 'date', 'begin', 'end', 'confirmed', 'notebook_id', 'professional_id', 'customer_id'];

    public function notebook()
    {
        return $this->belongsTo(Notebook::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
