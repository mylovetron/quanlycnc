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
                $arr[] = ['mavattu' => $value->mavattu, 'tenvattu' => $value->tenvattu,'hieu'=>$value->hieu,'dvt'=>$value->dvt,'quycach'=>$value->quycach,'macu'=>$value->macu,'partnumber'=>$value->partnumber,'ghichu'=>$value->ghichu];
            }
 
            if(!empty($arr)){
                Vattu::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
        
    }

    public function downloadExcel($type)
    {
        $data = Vattu::get()->toArray();
        return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                //$sheet->fromArray($data);
                //$sheet->setAutoFilter();
                $sheet->setAutoFilter('A1:E10');
                $sheet->cell('A1', function($cell) {$cell->setValue('Mã vật tư');   });
                $sheet->cell('B1', function($cell) {$cell->setValue('Tên vật tư');   });
                $sheet->cell('C1', function($cell) {$cell->setValue('ĐVT');   });

                if (!empty($data)) {
                    foreach ($data as $key => $value) {
                        $i= $key+2;
                        $sheet->cell('A'.$i, $value['mavattu']); 
                        $sheet->cell('B'.$i, $value['tenvattu']); 
                        $sheet->cell('C'.$i, $value['dvt']); 
                    }
                }







            });
        })->download($type);
    }

}
