<?php namespace Adrian\Project\Models;

use Model;
use Adrian\Project\Http\Resources\ProjectsResource;

/**
 * Project Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrian_project_projects';
    public $rules = [];
    
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
        'tasks' => ['Adrian\Task\Models\Task']
    ];
    
    public $belongsTo = [
        'project_manager' => ['Rainlab\User\Models\User'], 
        'customer' => ['Rainlab\User\Models\User'],
    ];
    
    public $belongsToMany = [
        'accounting_people' => ['Rainlab\User\Models\User', 'table' => 'adrian_project_user'],
    ];

    public function scopeIsCompleted($query)
    {
        return $query->where('is_completed', true);
    }

    protected $slugs = ['slug' => 'name'];

}
