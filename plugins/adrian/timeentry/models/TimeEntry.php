<?php namespace Adrian\TimeEntry\Models;

use Model;

/**
 * TimeEntry Model
 */
class TimeEntry extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrian_timeentry_time_entries';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    public $rules = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public $belongsTo = [
        'task' => ['Adrian\Project\Models\Project']
    ];


    public function beforeSave() {

        if ($this->end_time != null) {

            $total_time = now()->diffInMinutes($this->start_time); 
            
            $this->total_time = $total_time;

        }
    }

}
