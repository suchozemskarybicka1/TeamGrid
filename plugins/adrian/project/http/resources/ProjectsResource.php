<?php    

namespace Adrian\Project\Http\Resources;
   
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource {

    public function toArray($request) {
        return [
            "id" => $this->id,
            "customer" => $this->customer,
            "name" => $this->name,
            "project_manager" => $this->project_manager,
            "rate" => $this->rate,
            "budget" => $this->budget,
            "created_at" => date($this->created_at)
        ];
    }
    
}