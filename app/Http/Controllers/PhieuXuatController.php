<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PhieuXuatRequest;
use App\PhieuXuat;
use Excel;

class PhieuXuatController extends Controller
{
    public  function getAdd(){
        return view('admin.pages.phieuxuat_add');
    }

    public  function postAdd(PhieuXuatRequest $request){
        $phieuxuat=new PhieuXuat;
        $phieuxuat->ngayxuat=$request->dateNgayXuat;
        $phieuxuat->mavattu=$request->txtMaVattu;
        $phieuxuat->soluong=$request->txtSoLuong;
        $phieuxuat->giatri=$request->txtGiaTri;
        $phieuxuat->nguoixuat=$request->txtNguoiXuat;
        $phieuxuat->ghichu=$request->txtGhiChu;
        $phieuxuat->save();
        //print_r($phieunhap);
        return redirect()->route('admin.phieuxuat.getList')->with(['flash_level'=>'success','flash_message'=>'Thêm phiếu xuất thành công!']);
    }

    public  function getList(){
        $data = PhieuXuat::select('mavattu','soluong','giatri','nguoixuat','ngayxuat','ghichu')->get()->toArray();
        return view('admin.pages.phieuxuat_list',compact('data'));
    }

    public function getImport()
    {
        return view('admin.pages.phieuxuat_import');
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
                $arr[] = ['mavattu' => $value->mavattu, 'ngayxuat' =>today(),'soluong'=>$value->soluong,'giatri'=>$value->giatri,'nguoixuat'=>'','ghichu'=>''];
            }
 
            if(!empty($arr)){
                PhieuXuat::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
        
    }

 
}
