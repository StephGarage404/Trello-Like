<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'list_id', 'user_id', 'due_date'];

    public function list()
    {
        return $this->belongsTo(Lists::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}