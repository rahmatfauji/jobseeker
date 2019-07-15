<?php
use App\Detail_user;

function rupiahFormat($amount=0){
    return 'Rp. '.number_format(intval($amount),0, '', '.').',-';
}

function cekProfil($id){
    $cek = Detail_user::where('user_id',$id)->first();
    if(is_null($cek->gender) || is_null($cek->address) || is_null($cek->city) || is_null($cek->mobilephone) 
    || is_null($cek->educational) || is_null($cek->filecv) ){
        return true;
    }else{
        return false;
    }
}

function formatTanggal($tgl){
    $date=date_create($tgl);
    return date_format($date, "d F Y");
}

function formatTanggalLong($tgl){
    $date=date_create($tgl);
    return date_format($date, "d F Y H:i:s");
}

function genderFormat($g){
    if($g=="M"){
        return "Male";
    }elseif($g=="F"){
        return "Female";
    }else{
        return "";
    }
}