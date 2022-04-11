<?php

namespace App\Modules\Bestsellers\Models;

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

    public function bestsellers_language() {
        return $this->hasMany(BestsellerLanguage::class);
    }
}
