<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','is_active'];

    protected $with = ['tasks'];

    public const IS_ACTIVE = ['A'=>'Active','D'=>'Deactive'];

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
