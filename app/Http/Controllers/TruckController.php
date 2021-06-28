<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Mechanic;
use App\Garage;
use App\Breakdown;
use Illuminate\Support\Facades\Hash;
class TruckController extends Controller
{
    //
   public function book(){
        return view('truck.book');
    }
    public function garage(){
    	return view('truck.garage');
    }

    public function mechanic(){
    	return view('truck.mechanic');
    }

       public function garageindex(){
        $data = Garage::all();
        return view('truck.garageindex');
    }

    public function mechanicindex(){
        $data = Mechanic::all();
        return view('truck.mechanicindex');
    }

    public function index(){
        $datas = Breakdown::all()->where('status','waiting');
    	return view('truck.index',compact('datas'));
    }

    public function trucks(){
        $datas = Breakdown::all();
        return view('truck.index',compact('datas'));
    }

     public function history(){
        $datas = Breakdown::all()->where('name',Auth::id());
        return view('history',compact('datas'));
    }

      public function mechistory(){
        $datas = Breakdown::all()->where('mechanic',Auth::id());
        return view('history',compact('datas'));
    }
    public function create(){
    	return view('truck.create');
    }
    public function booked($id,$mec){
       // $datas = Breakdown::all()->where('id',$request)->first();
        $data = Breakdown::findorfail($id);
        $data->mechanic = $mec;
        $data->status ='Accept';
        $data->save();
        $datas = Breakdown::all()->where('id',$id)->first();
        return view('active',compact('datas'));
    }

      public function cancel($id){
        $data = Breakdown::findorfail($id);
        $data->status ='cancel';
        $data->save();
        return redirect('/')->with('danger','Successfully Cancelled');
    }

     public function endtrip($id)
     {

        $data = Breakdown::findorfail($id);
        $to = \Carbon\Carbon::now();
        $from = \Carbon\Carbon::parse($data->created_at);
        $p = $to->diffInMinutes($from);
        $price = ($p * 40);
        $data->status ='complete';
        $data->cost = $price ;
        $data->save();       
       // return $price;
        return view('price',compact('price'));
        return redirect('/')->with('danger','Successfully Cancelled');
    }


      public function state($id){
       $datas = Breakdown::all()->where('id',$id)->first();
        return view('progress',compact('datas'));
    }

 
     public function garagesave(Request $request){

        $data = new Garage();
        $data->name = $request->input('name');
        $data->location = $request->input('location');
        $data->manager = $request->input('manager');
        $data->contact = $request->input('contact');
        $data->save();
        return back()->with('status','success');
        return view('truck.garageindex');
    }

    public function mechanicsave(Request $request){

        $user = User::all()->where('email',$request->input('email'))->first();

        $exist = Mechanic::all()->where('email',$request->input('email'))->first();
        if (!empty($exist)) {
            return back()->with('danger','already registered');
            # code...
        }
        if (empty($user)) {

             $data = new User();
            $data->name = $request->input('name');
            $data->role = 2;
            $data->phone = $request->input('phone');
            $data->email = $request->input('email');
            $data->password = \Hash::make('12345678');
            $data->save();

                $mech = new Mechanic();
                $mech->user_id = $data->id;
                $mech->name = $request->input('name');
                $mech->phone = $request->input('phone');
                $mech->email = $request->input('email');
                $mech->garage = $request->input('garage');
                $mech->status = 'free';
                $mech->save();
        }

        else
        {

         $data = User::findorfail($user->id);
         $data->role = 2;
         $data->phone = $request->input('phone');
         $data->save();

          $mech = new Mechanic();
          $mech->user_id = $data->id;
          $mech->name = $data->name;
          $mech->phone = $data->phone;
          $mech->email = $data->email;
          $mech->garage = $request->input('garage');
          $mech->status = 'free';
          $mech->save();
        }
       

       
         return back()->with('status','success');
        return view('truck.garageindex');
    }

     public function requestsave(Request $request){

        $da = Breakdown::all()->where('name',Auth::id())->where('status','waiting')->first();
        if (!empty($da)) {
           return redirect('waiting/'.$da->id)->with('status','We Are getting help for you!!');;
        }

        $data = new Breakdown();
        $data->name = Auth::id();
        $data->location = $request->input('location');
        $data->garage = $request->input('garage');
        $data->status = 'waiting';
        $data->save();

        // $datas = Mechanic::all()->where('status','free')->first();
        // if(!empty($datas))
        // $d = Mechanic::findorfail($datas->id);
        // $d->status='engaged';
        // $d->save();
        // endif
       // return back()->with('status','Booked Successfully');
        return redirect('waiting/'.$data->id)->with('status','Request Recived');;
        return view('sell',compact('datas'));
        return view('truck.garageindex');
    }
}
