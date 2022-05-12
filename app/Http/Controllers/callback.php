<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\akajo;
use App\Models\api_pay;
class callback extends Controller
{
    public function call($phone){
        $data = file_get_contents('php://input');
        $json = json_decode($data, true);
        $reference = $json['reference'];
        $code = $json['code'];
        $provider_reference = $json['provider_reference'] ;
        $orderNumber = $json['orderNumber'];
        $date = date('Y-m-d');
        if($phone == true){
            $user= htmlspecialchars($phone);
            $devise = api_pay::create([
                    'phone' => $user,
                    'reference' => $reference,
                    'date_pay' => $date,
                    'status' => $code
            ]);
            $msg='enregistrement reussi';
        }
        dd($reference);
    }
    public function ajax($phone,$reference){
        $success=0;
        $msg='';

        if(isset($phone,$reference)){
            $user=  trim(htmlspecialchars($phone));
            $prd= trim(htmlspecialchars($reference));

        if(fieldColumnNum('api_pay',['phone','reference'],[$user,$prd])){
            $pay=getAllColumnsWhereC('api_pay',['phone','reference'],[$user,$prd]);
            $getpay=$pay->fetchObject();
            if($getpay->status == 0){
                $success=1;
            }else{
                $success=2;
            }
        }
        }
        echo json_encode(['success' => $success, 'msg' => $msg]);
    }
}
