<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = ['user_id', 'task'];

    public function user()
    {
        return $this->belongsTo(User::class);

    }
}
