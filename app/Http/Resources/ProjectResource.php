<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'image' => asset('/storage/' . $this->image),
            'size' => $this->size,
            'skill' => new SkillResource($this->whenLoaded('skill')),
            'project_url' => $this->project_url,
            'created_at' =>  $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
