<?php    

namespace Adrian\Task\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource {

    public function toArray($request) {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "assignee" => $this->assignee,
            "tracked_time" => $this->tracked_time,
            "start_date" => $this->start_date,
            "end_date" => $this->end_date,
            "created_at" => date($this->created_at)
        ];
    }
    
}