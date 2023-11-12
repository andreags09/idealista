<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Date;

/**
 * @method static whereNotNull(string $string)
 * @method static where(string $string, string $string1, int $int)
 * @method static orderBy(string $string)
 * @method static findOrFail($id)
 *
 * @property int $id
 * @property string $typology
 * @property string $description
 * @property string $pictures
 * @property string $houseSize
 * @property string $gardenSize
 * @property int $score
 * @property string $irrelevantSince
 */

class Ad extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'typology',
        'description',
        'pictures',
        'houseSize',
        'gardenSize',
        'score',
        'irrelevantSince'
    ];

    public function typology(): string
    {
        return $this->typology;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function pictures(): string
    {
        return $this->pictures;
    }

    public function houseSize(): string
    {
        return $this->houseSize;
    }

    public function gardenSize(): string|null
    {
        return $this->gardenSize;
    }

    public function score(): int|null
    {
        return $this->score;
    }

    public function irrelevantSince(): string|null
    {
        return $this->irrelevantSince;
    }

    public function picture(): HasMany
    {
        return $this->hasMany(Picture::class);
    }
}
