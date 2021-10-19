<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

abstract class BaseResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // if(!isset($this->resource)) {
        //     return;
        // }

		

        //monto las hateoas
        if(method_exists($this, 'generateLinks')) {
            $hateoas = [
                'links' => $this->generateLinks($request),
            ];
            return array_merge(parent::toArray($request), $hateoas);        
        }

        return $request;
    }
}