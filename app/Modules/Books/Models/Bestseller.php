<?php

namespace App\Modules\Books\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestseller extends Model
{
    protected $fillable = [
        'copies_sold'
    ];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function translations() {
        return $this->hasMany(BestsellerLanguage::class);
    }
}
