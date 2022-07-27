<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Ramsey\Collection\Collection;

class CategoryService
{
    public function index()
    {
        $category = Category::select("id" , "name")->get();
        return $category;
    }

    public function store(array $data)
    {
        $category = Category::create($data);
        return $category;
    }

    public function get(int $id)
    {
        $category = Category::findOrFail($id);
        return $category;
    }

    public function update(array $data, int $id)
    {

        $category = $this->get($id);
        $category->update($data);
        return $category;
    }

    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return true;
    }


}
