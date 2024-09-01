<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Passport\HasApiTokens;

class Blog extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'user_id',
        'title',
        'blog',
    ];


    //connect to table user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
