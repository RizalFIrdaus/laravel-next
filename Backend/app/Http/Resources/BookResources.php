<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResources extends JsonResource
{
    public function __construct($resource, public $message)
    {
        parent::__construct($resource);
    }

    public function toArray(Request $request): array
    {
        return [
            "status" => true,
            "message" => $this->message,
            "data" => $this->resource
        ];
    }
}
