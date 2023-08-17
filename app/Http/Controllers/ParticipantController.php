<?php

namespace App\Http\Controllers;

use App\Exports\ExportParticipants;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use function League\Flysystem\move;

class ParticipantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|unique:participants,email',
                'phone' => 'required',
                'coupon_code' => 'required|unique:participants,coupon_code',
                'category' => 'required',
                'link' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg|max:10240',
            ]);

            if (!$validator->passes()) {

              return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);

            }
            else{

                if($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = $image->getClientOriginalName();
                    $request->image->move(public_path('images'), $imageName);
                }

                $participant = new Participant();
                $participant->name = $request->name;
                $participant->email = $request->email;
                $participant->phone = $request->phone;
                $participant->coupon_code = $request->coupon_code;
                $participant->category = $request->category;
                $participant->link = $request->link;

                if($request->hasFile('image')){
                    $participant->image = $imageName;
                }

                $status = $participant->save();

                if($status){

                    return response()->json(['status'=>1,'success'=>'Registration has completed successfully.']);
                }else{

                    return response()->json(['status'=>0,'error'=>'Registration has not completed successfully.']);
                }
            }

        } catch (\Exception $exception) {

            return response()->json(['status'=>0,'error'=>$exception->getMessage()]);
        }
    }

    public function downloadExcelSheet(){
        return Excel::download(new ExportParticipants, 'participants.xlsx');
    }

    public function destroy($id){
        $data = Participant::findOrfail($id)->delete();
        if($data){
            session::flash('success','Participant has been deleted successfully');
            return redirect()->back();
        }else{
            session::flash('error','Participant has not been deleted successfully');
            return redirect()->back();
        }

    }
}
