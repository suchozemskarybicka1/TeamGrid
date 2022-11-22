<?php namespace Adrian\Project\Models;

use Model;

/**
 * Project Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrian_project_projects';

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
    
    public function scopeIsCompleted($query)
    {
        return $query->where('is_completed', true);
    }

    protected $slugs = ['slug' => 'name'];

}
