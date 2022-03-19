<?php

namespace App\Modules\Notes\Models;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'ISBN',
        'user_id',
        'note'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
