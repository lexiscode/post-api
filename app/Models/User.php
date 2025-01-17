<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Traits\HasTableName;
use App\Models\Enums\ModulePrefixEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 */
final class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasTableName;

    /** @inheritdoc*/
    protected $table = ModulePrefixEnum::USER_MODULE->value;

    /** @inheritdoc */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** @inheritdoc */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @inheritdoc */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
