<?php

namespace App\Http\Controllers\Api;

use App\Filters\Ads\Category;
use App\Filters\Ads\Tag;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Models\Ad;
use App\Traits\ApiResponseHelper;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class AdController extends Controller
{
    use ApiResponseHelper;
    public function __invoke(Request $request)
    {
        $ads = app(Pipeline::class)
            ->send(Ad::query())
            ->through([
                Tag::class,
                Category::class
            ])
            ->thenReturn()
            ->get();
        return $this->sendSuccess("success" , AdsResource::collection( $ads));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index(Request $request)
//    {
//        $ads = Ad::query()->with(["tags:id,name" , "category:id,name" , "advertiser"]);
//        if (isset($request->category))
//        {
//            $ads = $ads->filterSearch("category" , $request->category);
//        }elseif (isset($request->tag))
//        {
//            $ads = $ads->filterSearch("tag" , $request->tag);
//        }
//        return $this->sendSuccess("success" , AdsResource::collection( $ads->get()));
//    }
}
