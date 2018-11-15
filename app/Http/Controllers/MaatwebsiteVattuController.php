<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\VattuRequest;
use App\Vattu;
use DB;
use Excel;




class MaatwebsiteVattuController extends Controller
{
    public function importExport()
    {
        return view('admin.pages.importExportVattu');
    }
 
       
    public function test(Request $request)
    {
        
         $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
 		//dd($data);
 		
        if($data[0]->count()){
            foreach ($data[0] as $key => $value) {
                $arr[] = ['mavattu' => $value->mavattu, 'tenvattu' => $value->tenvattu,'hieu'=>'','dvt'=>$value->dvt];
            }
 
            if(!empty($arr)){
                Vattu::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
        
    }

}
