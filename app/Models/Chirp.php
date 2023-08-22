<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Chirp
 *
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static \Database\Factories\ChirpFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Chirp withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Chirp extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'message',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
