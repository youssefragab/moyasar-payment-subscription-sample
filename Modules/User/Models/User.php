<?php

namespace Modules\User\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\User\Enums\StatusEnum;
use Modules\Subscription\Models\Subscription;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribedTo($planId)
    {
        return $this->subscriptions()->where([['plan_id', $planId],['status', 1]])->exists();
    }

    public function currentSubscription()
    {
        return $this->subscriptions()->where('status', 1)->latest()->first();
    }

}
