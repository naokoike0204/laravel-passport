<?php

namespace App\Interfaces;

interface MstPrefectureRepositoryInterface{
    public function getList(string $request);
    public function getFirst(int $prefecture_id);
}
