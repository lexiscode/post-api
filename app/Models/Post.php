<?php

namespace App\Models;

use App\Traits\HasTableName;
use App\Models\Enums\ModulePrefixEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property User $user
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 */
final class Post extends Model
{
    use HasFactory;
    use HasTableName;

    /** @inheritdoc*/
    protected $table = ModulePrefixEnum::POST_MODULE->value;

    /** @inheritdoc*/
    protected $fillable = [
        'title', 'content', 'user_id'
    ];

    /** @inheritdoc */
    protected $relations = [
        'user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
