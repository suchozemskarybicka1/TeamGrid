<?php    

namespace Adrian\TimeEntries\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntriesResource extends JsonResource {

    public function toArray($request) {
        return [
            "id" => $this->id,
            "start time" => $this->start_time,
            "end time" => $this->end_time,
            "created_at" => date($this->created_at),
            "task_id" => $this->task_id
        ];
    }
    
}