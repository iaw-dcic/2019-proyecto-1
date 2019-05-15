<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PruebasController extends Controller{
    //
    public function prueba(){}

    public function jd2decrypt(Request $req){

        function base16Encode($arg){
            $ret="";
            for($i=0;$i<strlen($arg);$i++){
                $tmp=ord(substr($arg,$i,1));	
                $ret.=dechex($tmp);	
            }
            return $ret;
        }
        
        $key = "1234567890987654";
        $transmitKey=base16Encode($key);
        $method = 'aes-128-cbc';
        // $enc = openssl_encrypt ($link, $method, $key, OPENSSL_RAW_DATA, $key);
        // $crypted=base64_encode($enc);

        // echo hex2bin($transmitKey)."<br>";
        
        $decrypted = openssl_decrypt($req->input('crypted'), $method, $key, OPENSSL_ZERO_PADDING, $key); // OPENSSL_ZERO_PADDING: permite recivir el texto cifrado en base64
        // echo "<p style='white-space: pre-line'>".$decrypted."</p>";
        return redirect('jd2')->with('links', $decrypted);
    }
}
