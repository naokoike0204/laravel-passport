<?php

namespace App\Services\S3;


use Illuminate\Support\Facades\Storage;

class S3Service{


    /* S3にファイルを格納する */
    public function addS3File($request){
         // アップロードされたファイルを変数に格納
      $upload_file = $request->file('image');

      // ファイルがアップロードされた場合
      if(!empty($upload_file)) {

         // アップロード先S3フォルダ名
         $dir = 'test';

         // バケット内の指定フォルダへアップロード ※putFileはLaravel側でファイル名の一意のIDを自動的に生成してくれます。
         $s3_upload = Storage::disk('s3')->putFile('/'.$dir, $upload_file);

         // ※オプション（ファイルダウンロード、削除時に使用するS3でのファイル保存名、アップロード先のパスを取得します。）
         // アップロードファイルurlを取得
         $s3_url = Storage::disk('s3')->url($s3_upload);

         // s3_urlからS3でのファイル保存名取得
         $fileName = strrchr($s3_url,"/");
         $s3_upload_file_name = substr($fileName,1);

         // アップロード先パスを取得 ※ファイルダウンロード、削除で使用します。
         $s3_path = $dir.'/'.$s3_upload_file_name;

         return $s3_path;
      }else{
        return false;
      }
    }

    /* 一時URLの取得 */
    public function getS3FileUrl($s3ImageUrl,$timeMinutes=5){
        return Storage::disk('s3')->temporaryUrl(
            $s3ImageUrl, now()->addMinutes($timeMinutes)
        );
    }


}
