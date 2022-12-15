<?php namespace Adrian\Task\Models;

use Model;

/**
 * Task Model
 */
class Task extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrian_task_tasks';
    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $hasMany = [
        'time_entries' => ['Adrian\TimeEntry\Models\TimeEntry']
    ];


    public $belongsTo = [
        'user' => ['RainLab\User\Models\User'],
        'project' => ['Adrian\Project\Models\Project']
    ];
    

    public function getTotalTimeAttribute()
    {
        return $this->time_entries()->sum('total_time');        
    }
}
