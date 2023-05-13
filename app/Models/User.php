<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable, Notifiable;

    protected $table = "users";
    protected $guarded = [];

    public function feedbacks()
    {
        return $this->hasMany(
            Feedback::class,
            "feedback_id",
            "id"
        );
    }

}