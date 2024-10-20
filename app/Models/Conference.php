<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Conference extends Model
{
    use HasFactory;

    // Add the fillable fields
    protected $fillable = ['name', 'description', 'date'];
    
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}