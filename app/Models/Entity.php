<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use Uuids, HasFactory, SoftDeletes;

    // protected $fillable = ['name', 'description'];

    protected $guarded = [];

    public function incidents(): ?HasMany
    {
        return $this->hasMany(Incident::class);
    }
}
