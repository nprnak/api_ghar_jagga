<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $department
 * @property string|null $location
 * @property string $employment_type
 * @property string $description
 * @property array<int, string>|null $requirements
 * @property Carbon|null $deadline
 * @property bool $is_published
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable([
    'title',
    'slug',
    'department',
    'location',
    'employment_type',
    'description',
    'requirements',
    'deadline',
    'is_published',
])]
class Career extends Model
{
    /** @use HasFactory<\Database\Factories\CareerFactory> */
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'requirements' => 'array',
            'deadline' => 'date',
            'is_published' => 'boolean',
        ];
    }

    /**
     * @param  Builder<Career>  $query
     * @return Builder<Career>
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    /**
     * @param  Builder<Career>  $query
     * @return Builder<Career>
     */
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderByDesc('created_at');
    }
}
