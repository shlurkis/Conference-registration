<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role'];
    public function conferences(): BelongsToMany
    {
        return $this->belongsToMany(Conference::class);
    }
}