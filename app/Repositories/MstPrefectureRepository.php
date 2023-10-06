<?php

namespace App\Repositories;

use App\Interfaces\MstPrefectureRepositoryInterface;
use App\Models\MstPrefecture;
use Illuminate\Support\Facades\DB;

class MstPrefectureRepository implements MstPrefectureRepositoryInterface
{

    /**
     * 都道府県一覧を取得
     *
     * @param Request $request
     * @return void
     */
    public function getList($request){
        if(!empty($request)){//入力された文字で検索
            return DB::table('mst_prefectures')->where('name', 'LIKE', '%'.$request.'%')->limit(1)->get();
        }else{//全件取得
            return MstPrefecture::all();
        }

    }


    /**
     * 保存されている都道府県を1件取得
     *
     * @param integer $prefecture_id
     * @return object
     */
    public function getPrefectureFirst($prefecture_id){
        return MstPrefecture::where('id','=',$prefecture_id)->first();
    }
}
