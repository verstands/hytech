<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\akajo;
class traitementajax extends Controller
{
    public function traitement(){
        $success=0;
        $msg='';

        if(isset($_GET['phone'],$_GET['reference'])){
            $user=  trim(htmlspecialchars($_GET['phone']));
            $prd= trim(htmlspecialchars($_GET['reference']));

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
