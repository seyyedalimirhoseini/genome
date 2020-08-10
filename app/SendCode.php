<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ipecompany\Smsirlaravel\Smsirlaravel;
use Trez\RayganSms\Facades\RayganSms;

class SendCode extends Model
{
    public  static function sendCode($phone)
    {
        $code=rand(1111,9999);
        Smsirlaravel::sendVerification($code,'+98'.(int) $phone);
        return $code;
//        RayganSms::sendAuthCode('+98'.(int)$phone, $code, false);
//        return $code;
    }
}
