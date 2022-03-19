<?php

namespace App\Modules\Books\Models;

use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookUser extends Model
{
    protected $fillable = [
        'ISBN',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
