<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static find($id)
 * @method static findOrFail($id)
 *
 * @property int $id
 * @property string $url
 * @property string $quality
 */

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url',
        'quality'
    ];

    public function id(): int
    {
        return $this->id;
    }

    public function url(): string
    {
        return $this->url;
    }

    public function quality(): string
    {
        return $this->quality;
    }

    public function ad(): BelongsTo
    {
        return $this->belongsTo(Ad::class);
    }
}
