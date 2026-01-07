<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use InteractsWithMedia;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
        $this->addMediaCollection('hero_images');
        $this->addMediaCollection('block_images');
    }

    protected static function booted()
    {
        static::creating(function ($company) {
            $company->slug = Str::slug($company->name);
            $company->access_code = strtoupper(Str::random(8));
        });
    }
}
