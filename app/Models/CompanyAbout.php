<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyAbout extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'thumbnail',
        'type',
    ];

    public function keypoints()
    {
        return $this->hasMany(CompanyKeypoint::class);
    }

    protected static function booted()
    {
        static::deleting(function ($about) {
            $about->keypoints()->delete(); // Soft delete keypoints
        });
    }
}
