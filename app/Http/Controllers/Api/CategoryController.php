<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreCategoryRequest;
use App\Http\Requests\Api\updateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use App\Traits\ApiResponseHelper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiResponseHelper;
    private $category;
    public function __construct(CategoryService $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCategories = $this->category->index();
        if (!empty($allCategories))
        {
            return $this->sendSuccess("success",CategoryResource::collection($allCategories));
        }
        return $this->sendSuccess("no data" , []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = $this->category->store($request->all());
        return $this->sendSuccess("category added successfully" , new CategoryResource($category));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->category->get($id);
        return $this->sendSuccess("success" , new CategoryResource($category));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateCategoryRequest $request, $id)
    {
        $category = $this->category->update($request->all(), $id);
        return $this->sendSuccess("updated successfully" , new CategoryResource($category));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->category->destroy($id);
        return $this->sendSuccess("deleted successfully" , null);
    }
}
