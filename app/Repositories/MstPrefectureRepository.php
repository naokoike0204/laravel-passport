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
     * @param string $request
     * @return void
     */
    public function getList(string $request){
        if(empty($request)){
            return MstPrefecture::all();
        }
            //入力された文字で検索
        return MstPrefecture::where('name', 'LIKE', '%'.$request.'%')->limit(1)->get();

    }


    /**
     * 保存されている都道府県を1件取得
     *
     * @param integer $prefecture_id
     * @return object
     */
    public function getFirst($prefecture_id){
        return MstPrefecture::where('id','=',$prefecture_id)->first();
    }
}
