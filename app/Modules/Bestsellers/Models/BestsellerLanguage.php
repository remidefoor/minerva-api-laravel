<?php

namespace App\Modules\Bestsellers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestsellerLanguage extends Model
{
    protected $fillable = [
        'bestseller_id',
        'language',
        'title'
    ];

    protected $hidden = [
        'bestseller_id',
        'created_at',
        'updated_at'
    ];

    public function bestseller() {
        return $this->belongsTo(Bestseller::class);
    }
}
