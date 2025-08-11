<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Pet extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'animal_type_id',
        'name',
        'breed',
        'age',
        'gender',
        'size',
        'weight',
        'color',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'age' => 'integer',
            'weight' => 'decimal:2',
        ];
    }

    /**
     * Get the animal type that owns the pet.
     */
    public function animalType(): BelongsTo
    {
        return $this->belongsTo(AnimalType::class);
    }

    /**
     * Scope to filter pets by animal type.
     */
    public function scopeOfType($query, string $typeName)
    {
        return $query->whereHas('animalType', function ($q) use ($typeName) {
            $q->where('name', $typeName);
        });
    }

    /**
     * Scope to filter pets by size.
     */
    public function scopeBySize($query, string $size)
    {
        return $query->where('size', $size);
    }

    /**
     * Scope to filter pets by gender.
     */
    public function scopeByGender($query, string $gender)
    {
        return $query->where('gender', $gender);
    }

    /**
     * Get the pet's display name with type.
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->name} ({$this->animalType->display_name})";
    }

    /**
     * Check if the pet is a specific type.
     */
    public function isType(string $typeName): bool
    {
        return $this->animalType->name === $typeName;
    }
}
