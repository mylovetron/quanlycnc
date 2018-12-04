<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vattu;

class SearchController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchUsers(Request $request)
    {
        return User::where('name', 'LIKE', '%'.$request->q.'%')->get();
    }

    public function searchMaVattu(Request $request)
    {
        return Vattu::where('mavattu', 'LIKE', '%'.$request->q.'%')->get();
    }

    public function searchTenVattuAjax($id)
    {
        //$vattu = Vattu::where('mavattu', '=',$id)->get();
        $vattu = Vattu::find($id);
        return $vattu;
    }

}
