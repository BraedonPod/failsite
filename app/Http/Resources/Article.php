<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class Article extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this-> id,
            'author' => $this-> author,
            'gender' => $this-> gender,
            'body' => $this-> body,
            'created_at' => $this-> created_at,
            'updated_at' => $this-> updated_at,
            ];
    }
}
