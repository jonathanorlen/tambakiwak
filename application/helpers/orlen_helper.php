<?php
     function cek_status($id)
     {
         if($id=='1')
             return '<btn class="btn btn-success">Active</btn>';
         else 
             return '<btn class="btn btn-danger">Not Active</btn>';
     }


     
function encode($data)
{
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function decode($data)
{
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
}

define('CLASS_ENCRYPT', dirname(__FILE__));
include('cryptography/AES.class.php');
include('cryptography/class.hash_crypt.php');

function keypass()
{
    return md5('inv'.md5('store'));
}

function paramEncrypt($x)
{

    $first_output = '';
    $count = 0;

    $Cipher = new AES();
    $key_256bit = keypass();
    
    $n = ceil(strlen($x)/16);
    $encrypt = "";

    for ($i=0; $i<=$n-1; $i++)
    {
        $cryptext = $Cipher->encrypt($Cipher->stringToHex(substr($x, $i*16, 16)),$key_256bit);
        $encrypt .= $cryptext;   
    }

    return $encrypt;
}

function paramDecrypt($x)
{
    $Cipher = new AES();
    $key_256bit = keypass();

    $n = ceil(strlen($x)/32);
    $decrypt = "";

    for ($i=0; $i<=$n-1; $i++)
    {
        $result = $Cipher->decrypt(substr($x, $i*32, 32), $key_256bit);
        $decrypt .= $Cipher->hexToString($result);
    }

    return $decrypt;
}

function passwordEncrypt($x)
{
    $password1 = paramEncrypt($x);
    $password2 = encode($password1);

    return $password2;
    
}

function passwordDecrypt($x)
{
    $password1 = decode($x);
    $password2 = paramDecrypt($password1);

    return $password2;
}

function TanggalIndo($date){
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
 
    $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;        
    return($result);
}