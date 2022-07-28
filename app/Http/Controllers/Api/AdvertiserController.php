<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdsResource;
use App\Models\Advertiser;
use App\Traits\ApiResponseHelper;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{
    use ApiResponseHelper;
    public function __invoke(Request $request , $id)
    {
        $advertiser = Advertiser::where("id",$id)->with(["ads"])->firstOrFail();
        if (count($advertiser->ads) > 0)
        {
            return $this->sendSuccess("success" ,  AdsResource::collection($advertiser->ads));
        }
        return $this->sendSuccess("no ads" ,  []);
    }
}
