<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ReadNotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            'type' => ltrim(preg_replace('/(?<!\ )[A-Z]/', ' $0', Str::remove('Notification', explode("\\",$this->type)[2])), ' '),
            "notifiable_id" => $this->notifiable_id,
            "data" => $this->data,
            "read_at" => (string) $this->read_at,
            "created_at" => $this->created_at->diffForHumans(),
            "updated_at" => (string) $this->updated_at,
        ];
    }
}
