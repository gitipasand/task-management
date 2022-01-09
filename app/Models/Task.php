<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','is_active','priority','project_id'];

    public const IS_ACTIVE = ['A'=>'Active','D'=>'Deactive'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getPriority($project_id)
    {
        $priority = Task::query()->where('project_id',$project_id)->max('priority');
        return $priority ? $priority+1: 1;
    }
}
