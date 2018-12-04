<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VattuRequest;
use App\Vattu;

class VattuController extends Controller
{
    public  function getList(){
        //$data = vattu::select('mavattu','tenvattu','hieu','dvt')->get()->toArray();
        $data=Vattu::where('mavattu', 'LIKE', '%B%')->get()->toArray();
        return view('admin.pages.vattu_list',compact('data'));
    }

    public  function getXuatKho(){
        //$data = vattu::select('mavattu','tenvattu','hieu','dvt')->get()->toArray();
        return view('admin.pages.vattu_xuatkho');
    }

    public  function getNhapKho(){
        //$data = vattu::select('mavattu','tenvattu','hieu','dvt')->get()->toArray();
        return view('admin.pages.vattu_nhapkho');
    }

    public  function getAdd(){
        return view('admin.pages.vattu_add');
    }

    public  function postAdd(VattuRequest $request){
        $vattu=new Vattu;
        $vattu->mavattu=$request->txtMaVattu ;
        $vattu->tenvattu=$request->txtTenVattu ;
        $vattu->hieu=$request->txtHieu;
        $vattu->dvt=$request->txtDVT;
        $vattu->save();
        print_r($vattu);
        //return redirect()->route('admin.cate.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm category thành công!']);
    }
}
