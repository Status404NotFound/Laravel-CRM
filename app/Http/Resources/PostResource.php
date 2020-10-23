<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'slug' => $this->slug,
            'title' => $this->title,
            'image_url' => $this->image_url,
            'description' => $this->description,
            'content_text' => $this->content_text,
            'is_published' => $this->is_published,
            'published_at' => $this->published_at,
        ];
    }
}
