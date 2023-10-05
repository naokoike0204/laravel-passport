<?php

namespace App\Interfaces;

interface MstPrefectureRepositoryInterface{
    public function getList($request);
    public function getPrefectureFirst($prefecture_id);
}
