<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhieuNhapRequest;
use App\PhieuNhapKho;

class PhieuNhapController extends Controller
{
    public  function getAdd(){
        return view('admin.pages.phieunhap_add');
    }

    public  function postAdd(PhieuNhapRequest $request){
        $phieunhap=new PhieuNhapKho;
        $phieunhap->ngaynhap=$request->dateNgayNhap;
        $phieunhap->mavattu=$request->txtMaVattu;
        $phieunhap->soluong=$request->txtSoLuong;
        $phieunhap->dongia=$request->txtDonGia;
        $phieunhap->nguoinhap=$request->txtNguoiNhap;
        $phieunhap->ghichu=$request->txtGhiChu;
        $phieunhap->save();
        print_r($phieunhap);
        return redirect()->route('admin.phieunhap.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm phiếu nhập thành công!']);
    }

    public  function getList(){
        $data = PhieuNhapKho::select('mavattu','soluong','dongia','nguoinhap','ngaynhap','ghichu')->get()->toArray();
        return view('admin.pages.phieunhap_list',compact('data'));
    }

}
