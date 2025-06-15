<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
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
            'title' => $this->title,
            'body' => $this->body,
            'views_count' => $this->views_count,
            'image' => Storage::disk('public')->url($this->image),
            'created_at' => verta($this->created_at)->format('Y/m/d H:i'),
            'updated_at' => verta($this->updated_at)->format('Y/m/d H:i'),
        ];
    }
}
