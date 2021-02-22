<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nim = isset($_GET['id'])?$_GET['id']:'';
        if(isset($nim)){
            $data['nim'] = DB::table('students')->select('*')->where('nim',$nim)->limit(1)->get();
        }else{
            $data['nim'] = '';
        }

        $data['study'] = DB::table('students')->select('acad_prog_desc')
                          ->whereNotNull('acad_prog_desc')
                          ->orderby('acad_prog_desc')
                          ->groupby('acad_prog_desc')->get();
        $data['batch'] = DB::table('students')->select('admit_term')->groupby('admit_term')->get();
        return view('home')->with($data);
    }

    public function search(Request $request){
        $name = isset($request->name)?$request->name:'';
        $study = isset($request->study)?$request->study:'';
        $batch = isset($request->batch)?$request->batch:'';
        $sql = DB::table('students')->select('id','name','photo','acad_prog_desc','admit_term')->where('id','!=',auth()->id());
        if($name !== ''){
            $sql->where('name','like','%'.$name.'%');
        }
        if($study !== ''){
            $sql->where('acad_prog_desc',$study);
        }
        if($batch !== ''){
            $sql->whereRaw('substring(admit_term,2,2) =?',$batch);
        }
        $students = $sql->get();

        return response()->json($students);
    }
}
