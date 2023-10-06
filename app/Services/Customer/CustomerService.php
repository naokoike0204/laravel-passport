<?php
namespace App\Services\Customer;

use App\Models\MstGender;
use App\Repositories\CustomerHobbyRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\MstGenderRepository;
use App\Repositories\MstHobbyRepository;
use App\Repositories\MstPrefectureRepository;
Use App\Services\S3\S3Service;

class CustomerService{

    private $customerRepository;
    private $customerHobbyRepository;
    private $mstGenderRepository;
    private $mstHobbyRepository;
    private $mstPrefectureRepository;
    private $S3service;

    public function __construct(
        CustomerRepository $customerRepository,
        CustomerHobbyRepository $customerHobbyRepository,
        MstGenderRepository $mstGenderRepository,
        MstHobbyRepository $mstHobbyRepository,
        MstPrefectureRepository $mstPrefectureRepository,
        S3Service $S3service,
    )
    {
        $this->customerRepository = $customerRepository;
        $this->customerHobbyRepository = $customerHobbyRepository;
        $this->mstGenderRepository = $mstGenderRepository;
        $this->mstHobbyRepository = $mstHobbyRepository;
        $this->mstPrefectureRepository = $mstPrefectureRepository;
        $this->S3service = $S3service;

    }


    /**
     * 顧客一覧
     *
     * @param integer $paginate_count
     * @return object
     */
    public function getCustomerAll($paginate_count=15){
        return $this->customerRepository->getCustomerAll($paginate_count);
    }


    /**
     * 顧客の詳細データ取得
     *
     * @param integer $customer_id
     * @return object
     */
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
            $customer->image_url = $this->S3service->getS3FileTemporaryUrl($customer->image,10);
            return $customer;
        }else{
           return (object)[];
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
        $s3_image_path = $this->S3service->addS3File($request);
        if($s3_image_path){
            $request->image = $s3_image_path;
        }
        $customer = $this->customerRepository->insertCustomerProfile($request);
        $this->customerHobbyRepository->insertCustomerHobby($customer->id,$request->hobby_id);
        return $customer;
    }

    //顧客詳細の更新
    public function updateCustomerProfile($customer_id,$request){
        $s3_image_path = $this->S3service->addS3File($request);
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
