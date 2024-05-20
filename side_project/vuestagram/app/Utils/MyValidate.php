<?php 

namespace App\Utils;

use Illuminate\Support\Facades\Validator;

// 자식요소에게 강제로 부여
abstract class MyValidate {
    protected $validateList;  // 유효성 체크 패턴 리스트

    public function myValidate($chkData) {
        $validateItem = [];
        
        // $chkData = [
        //     'account' => 'qwer'
        //     ,'password' => 'qwer'
        // ];
        // $this-> validateList = [
        //     'account' => ['required', 'min:10']
        //     ,'password' => ['required', 'min:10']
        //     ,'name' => ['required', 'min:10']
        // ];
        // 필요한 값만 남기고 나머지는 제거

        // 유효성 체크 리스트 재구성
        foreach($chkData as $key => $val) {
            $validateItem[$key] = $this->validateList[$key];
        } 

        // 유효성 검사
        return Validator::make($chkData, $validateItem);
    }

}