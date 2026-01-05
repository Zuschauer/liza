<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'access_code',
        'is_active',
        'content',
    ];

    protected $casts = [
        'content' => 'array',
    ];

    protected static function booted()
    {
        static::creating(function ($company) {
            $company->slug = Str::slug($company->name);
            $company->access_code = strtoupper(Str::random(8));
        });
    }
}
