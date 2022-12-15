<?php namespace Adrian\TimeEntry\Models;

use Model;
use Carbon\Carbon;

/**
 * TimeEntry Model
 */
class TimeEntry extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'adrian_timeentry_time_entries';

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

    public $belongsTo = [
        'user' => ['RainLab\User\Models\User'],
        'task' => ['Adrian\Task\Models\Task']
    ];


    public function beforeSave() {
     
        if ($this->end_time != null) {

            $start_time = Carbon::parse($this->start_time);
            $end_time = Carbon::parse($this->end_time);
            $total_time = $end_time->diffInMinutes($start_time);
            
            $this->total_time = $total_time;

        }

    }

}
