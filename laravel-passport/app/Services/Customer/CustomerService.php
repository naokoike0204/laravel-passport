<?php
namespace App\Services\Customer;

use App\Models\MstGender;
use App\Repositories\CustomerHobbyRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\MstGenderRepository;
use App\Repositories\MstHobbyRepository;
use App\Repositories\MstPrefectureRepository;

class CustomerService{

    private $customerRepository;
    private $customerHobbyRepository;
    private $mstGenderRepository;
    private $mstHobbyRepository;
    private $mstPrefectureRepository;

    public function __construct(
        CustomerRepository $customerRepository,
        CustomerHobbyRepository $customerHobbyRepository,
        MstGenderRepository $mstGenderRepository,
        MstHobbyRepository $mstHobbyRepository,
        MstPrefectureRepository $mstPrefectureRepository,
    )
    {
        $this->customerRepository = $customerRepository;
        $this->customerHobbyRepository = $customerHobbyRepository;
        $this->mstGenderRepository = $mstGenderRepository;
        $this->mstHobbyRepository = $mstHobbyRepository;
        $this->mstPrefectureRepository = $mstPrefectureRepository;

    }

    //顧客一覧
    public function getCustomerAll($paginate_count=15){
        return $this->customerRepository->getCustomerAll($paginate_count);
    }


    //顧客の詳細データ取得
    public function getCustomerIdFirst($customer_id=0){
            if($customer_id){
            $customer = $this->customerRepository->getCustomerIdFirst($customer_id);
            $hobby_id = $this->customerHobbyRepository->getCustomerHobbyList($customer_id);
            $customer->prefecture_name = $this->mstPrefectureRepository->getPrefectureFirst($customer->prefecture_id);
            $hobby_list = [];
            foreach($hobby_id as $hobby){
                $hobby_list[]=$hobby->id;
            }
            $customer->hobby_id = $hobby_list;
            $s3 = app()->make('S3Service');
            $customer->image_url = $s3->getS3FileUrl($customer->image,10);
            return $customer;
        }else{//新規の場合
            $customer = (object)[
                'id'=>0,
                'name' => '',
                'age' => '',
                'gender_id' => '',
                'prefecture_id' => '',
                'address' => '',
                'pr_description' => '',
                'hobby_id' =>[],
                'image'=>'',
                'image_url'=>''
            ];
            $customer->prefecture_name = (object)[];
            $customer->prefecture_name->name = '';
            return $customer;
        }
    }

    //性別一覧
    public function getGenderList(){
       return  $this->mstGenderRepository->GetList();
    }

    //趣味一覧
    public function getHobbyList(){
        return  $this->mstHobbyRepository->GetList();
    }


    //顧客詳細の新規登録
    public function insertCustomerProfile($request){
        $s3 = app()->make('S3Service');
        $s3_image_path = $s3->addS3File($request);
        if($s3_image_path){
            $request->image = $s3_image_path;
        }
        $customer = $this->customerRepository->insertCustomerProfile($request);
        $this->customerHobbyRepository->insertCustomerHobby($customer->id,$request->hobby_id);
        return $customer;
    }

    //顧客詳細の更新
    public function updateCustomerProfile($customer_id,$request){
        $s3 = app()->make('S3Service');
        $s3_image_path = $s3->addS3File($request);
        if($s3_image_path){
            $request->image = $s3_image_path;
        }
        $customer = $this->customerRepository->updateCustomerProfile($customer_id,$request);
        $this->customerHobbyRepository->updateCustomerHobby($customer_id,$request->hobby_id);
        return $customer;
    }

    //都道府県一覧
    public function getPrefectureList($request){
        return $this->mstPrefectureRepository->getList($request);
    }

    //顧客データ削除
    public function deleteCustomerProfile($customer_id){
        return $this->customerRepository->deleteCustomerprofile($customer_id);
    }


}
