<?php

namespace App\Http\Controllers;


use App\Models\Participant;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

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


    public function index(Request $request)
    {

        if ($request->ajax()) {
            $datas = Participant::select('*');

            return Datatables::of($datas)
                ->addIndexColumn()
                ->order(function ($data) {
                    $data->orderBy('id', 'desc');
                })
                ->editColumn('image', function ($data) {
                    return isset($data->image) ? '<img src="' . asset('images/'.$data->image) . '" width="50%" height="50%">' : '';
                })
                ->editColumn('created_at', function ($data) {
                    return date('d M, Y g:i A',strtotime($data->created_at));
                })
                ->addColumn('link', function($data){
                    return "<a target='_blank'  href='" . (isset($data->link) ? $data->link : '') . "' class='edit btn btn-info btn-sm'>Preview</a>";
                })
                ->addColumn('action', function($data){
                    return "<a  onclick=\"return confirm(`Are you sure to delete??`)\" href='".route('participant_delete',$data->id)."' class='edit btn btn-danger btn-sm'>Delete</a>";
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        }

        return view('home');
    }
}
