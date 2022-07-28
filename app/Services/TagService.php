<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public function index()
    {
        $tag = Tag::select("id" , "name")->get();
        return $tag;
    }

    public function store(array $data)
    {
        $tag = Tag::create($data);
        return $tag;
    }

    public function get(int $id)
    {
        $tag = Tag::findOrFail($id);
        return $tag;
    }

    public function update(array $data, int $id)
    {

        $tag = $this->get($id);
        $tag->update($data);
        return $tag;
    }

    public function destroy(int $id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        return true;
    }
}
