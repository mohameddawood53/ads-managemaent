<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Http\Resources\TagResource;
use App\Services\TagService;
use App\Traits\ApiResponseHelper;
use Illuminate\Http\Request;

class TagController extends Controller
{
    use ApiResponseHelper;
    private $tag;
    public function __construct(TagService $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = $this->tag->index();
        if(!empty($tags))
        {
            return $this->sendSuccess("success" , TagResource::collection($tags));
        }
        return $this->sendSuccess("no data" , []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $tag = $this->tag->store($request->all());
        return $this->sendSuccess("added succssfully" , new TagResource($tag));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = $this->tag->get($id);
        return $this->sendSuccess("success" , new TagResource($tag));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        $tag = $this->tag->update($request->all() , $id);
        return $this->sendSuccess("updated successfully" , new TagResource($tag));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->tag->destroy($id);
        return $this->sendSuccess("deleted successfully" , null);
    }
}
