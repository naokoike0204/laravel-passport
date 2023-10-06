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

    /**
     * 都道府県の一覧を取得：SELECT2から呼ばれるAPI用
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse{

        $customerService = app()->make('CustomerService');
        $prefectures = $customerService->getPrefectureList($request->q);

        return response()->json($prefectures);
    }
}
