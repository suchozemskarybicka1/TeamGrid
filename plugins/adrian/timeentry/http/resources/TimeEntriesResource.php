<?php    

namespace Adrian\TimeEntry\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;

class TimeEntriesResource extends JsonResource {

    public function toArray($request) {
        return [
            "id" => $this->id,
            "task_id" => $this->task_id,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "total_time" => $this->total_time,
            "created_at" => date($this->created_at)
        ];
    }
    
}