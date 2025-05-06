<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone_number',
        'name',
        'email',
        'meeting_at',
        'brief',
        'product_id',
    ];

    protected $casts = [
        'meeting_at' => 'date', // Assuming you want to cast this to a date, for format method
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
