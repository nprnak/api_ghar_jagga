<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $company_name
 * @property string|null $company_name_np
 * @property string|null $tagline
 * @property string|null $tagline_np
 * @property string|null $about_short
 * @property string|null $about_full
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property string|null $address_np
 * @property string|null $working_hours
 * @property string|null $facebook_url
 * @property string|null $instagram_url
 * @property string|null $linkedin_url
 * @property string|null $youtube_url
 * @property string|null $tiktok_url
 * @property string|null $google_map_embed
 * @property string|null $google_map_lat
 * @property string|null $google_map_lng
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @property string|null $logo_path
 * @property string|null $favicon_path
 * @property string|null $hero_image
 * @property string|null $hero_headline
 * @property string|null $hero_headline_np
 * @property string|null $hero_subheadline
 * @property string|null $hero_cta_text
 * @property string|null $hero_cta_link
 * @property string|null $vision
 * @property string|null $mission
 * @property array<int, string>|null $objectives
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'company_name',
    'company_name_np',
    'tagline',
    'tagline_np',
    'about_short',
    'about_full',
    'phone',
    'email',
    'address',
    'address_np',
    'working_hours',
    'facebook_url',
    'instagram_url',
    'linkedin_url',
    'youtube_url',
    'tiktok_url',
    'google_map_embed',
    'google_map_lat',
    'google_map_lng',
    'seo_title',
    'seo_description',
    'seo_keywords',
    'logo_path',
    'favicon_path',
    'hero_image',
    'hero_headline',
    'hero_headline_np',
    'hero_subheadline',
    'hero_cta_text',
    'hero_cta_link',
    'vision',
    'mission',
    'objectives',
])]
class SiteSetting extends Model
{
    /** @use HasFactory<\Database\Factories\SiteSettingFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'objectives' => 'array',
            'google_map_lat' => 'decimal:7',
            'google_map_lng' => 'decimal:7',
        ];
    }
}
