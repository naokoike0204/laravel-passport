<?php

namespace App\Repositories;

use App\Interfaces\MstPrefectureRepositoryInterface;
use App\Models\MstPrefecture;
use Illuminate\Support\Facades\DB;

class MstPrefectureRepository implements MstPrefectureRepositoryInterface
{
    public function getList($request){

        if(!empty($request)){
            return DB::table('mst_prefectures')->where('name', 'LIKE', '%'.$request.'%')->limit(1)->get();

        }else{
            return MstPrefecture::all();
        }

    }

    public function getPrefectureFirst($prefecture_id){
        return MstPrefecture::where('id','=',$prefecture_id)->first();
    }
}
