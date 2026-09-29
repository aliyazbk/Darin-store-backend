<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StoreSetting extends Model
{
    protected $fillable = [
        'logo_path',
        'hero_video_path',
        'hero_title',
        'hero_subtitle',
        'hero_button_text',
        'hero_button_url',
    ];

    protected $appends = [
        'logo_url',
        'hero_video_url',
    ];

    public function getLogoUrlAttribute(): ?string
{
    return $this->logo_path
        ? url('media/' . ltrim($this->logo_path, '/'))
        : null;
}

public function getHeroVideoUrlAttribute(): ?string
{
    return $this->hero_video_path
        ? url('media/' . ltrim($this->hero_video_path, '/'))
        : null;
}
}