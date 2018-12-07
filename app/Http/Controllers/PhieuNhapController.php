<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhieuNhapRequest;
use App\PhieuNhapKho;
use Excel;

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
        $phieunhap->giatri=$request->txtGiaTri;
        $phieunhap->nguoinhap=$request->txtNguoiNhap;
        $phieunhap->ghichu=$request->txtGhiChu;
        $phieunhap->save();
        //print_r($phieunhap);
        return redirect()->route('admin.phieunhap.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm phiếu nhập thành công!']);
    }

    public  function getList(){
        $data = PhieuNhapKho::select('mavattu','soluong','giatri','nguoinhap','ngaynhap','ghichu')->get()->toArray();
        return view('admin.pages.phieunhap_list',compact('data'));
    }

    public function getImport()
    {
        return view('admin.pages.phieunhap_import');
    }

    public function postImport(Request $request)
    {
        //$mytime = Carbon\Carbon::now();
         $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        //dd($data);
        
        if($data[0]->count()){
            foreach ($data[0] as $key => $value) {
                $arr[] = ['mavattu' => $value->mavattu, 'ngaynhap' =>today(),'soluong'=>$value->soluong,'giatri'=>$value->giatri,'nguoinhap'=>'','ghichu'=>''];
            }
 
            if(!empty($arr)){
                PhieuNhapKho::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
        
    }

}
