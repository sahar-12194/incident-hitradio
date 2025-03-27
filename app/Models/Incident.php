<?php

namespace App\Models;

use App\Traits\Uuids;
use Dom\Entity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Incident extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    protected $guarded = [];


    public function user(): ?BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function entity(): ?BelongsTo
    {
        return $this->belongsTo(Entity::class);
    }
}
