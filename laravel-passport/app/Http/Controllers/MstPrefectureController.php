<?php

namespace App\Http\Controllers;

use App\Models\MstPrefecture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MstPrefectureController extends Controller
{
    public function __construct()
    {

    }

    public function get(Request $request): JsonResponse{

        $customerService = app()->make('CustomerService');
        $prefectures = $customerService->getPrefectureList($request->q);

        return response()->json($prefectures);
    }
}
