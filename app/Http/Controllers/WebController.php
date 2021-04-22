<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function ip()
    {
        $IPAddr = $_SERVER['REMOTE_ADDR'];
        $IPAddrCheck = ip2long($IPAddr);
        echo "Ваш ip: " . $IPAddr;
        if (($IPAddrCheck > ip2long("192.168.0.0") & $IPAddrCheck < ip2long("192.168.255.255")) || ($IPAddrCheck > ip2long("10.0.0.0") & $IPAddrCheck < ip2long("10.255.255.255"))||($IPAddrCheck > ip2long("172.16.0.0") & $IPAddrCheck < ip2long("172.31.255.255"))) {
            echo "<br />IP: серый";
        }
        else 
        {
            echo "<br />IP: белый";
        }
    }
    public function php()
    {
        phpinfo();
    }
    public function check(Request $request) {
        $validatedData = $request->validate([
            'string' => 'required|max:255',
        ]);
        echo $request->get('string');
        $stringTmp = $request->get('string');
        $stringTmp2 = "";
        $chars = ['!','#',',','@','$','%','^','&','*','(',')',' '];
        $stringTmp = str_replace($chars, '', $stringTmp);
        $stringTmp = mb_strtolower($stringTmp);
        for ($i=strlen($stringTmp)-1; $i >= 0 ; $i--) { 
            $stringTmp2 .= $stringTmp[$i];    
        }
        if ($stringTmp == $stringTmp2) {
            echo "<br />Строка является палиндромом!";
        }else {
            echo "<br />Строка не является палиндромом!";
        }
    }
}
