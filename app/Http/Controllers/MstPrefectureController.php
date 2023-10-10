<?php

namespace App\Http\Controllers;

use App\Models\MstPrefecture;
use App\Services\Customer\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MstPrefectureController extends Controller
{
    private $customerService;
    public function __construct(
        CustomerService $customerService,
    )
    {

        $this->customerService = $customerService;
    }

    /**
     * 都道府県の一覧を取得：SELECT2から呼ばれるAPI用
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse{

        $prefectures = $this->customerService->getPrefectureList($request->q??'');

        return response()->json($prefectures);
    }
}
