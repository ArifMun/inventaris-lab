<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {

    return view('admin.master.user.user',compact('user'));

    }


    public function search(Request $request)
    {

    if($request->ajax())
    {

    $output="";
    $products=DB::table('inv_barang')->where('nama_barang','LIKE','%'.$request->search."%")->get();

    // if($products)
    // {

    // foreach ($products as $key => $product) 
    //     $output.='<tr>'.
    //             '<td>'.$product->id.'</td>'.
    //             '<td>'.$product->username.'</td>'.
    //             '</tr>';
    // }


    return view('admin.master.user.user',['barang' => $products]);

        }
    }


}