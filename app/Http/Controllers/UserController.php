<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Input;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Blog;
use App\Models\Appointment;
use App\Models\Medicine;
use Carbon\Carbon;
use Session;

class UserController extends Controller
{

    public function home()
    {
        $data['blog'] = Blog::all();
        $data['doctor'] = Doctor::all();
        return view('pages.home',$data);
    }

    public function dashboard()
    {    
        $data['appointment'] = Appointment::where('patient_id', Session('loggedUser')->patient_id)->get();
        $data['patient'] = Patient::get();
        $data['doctor'] = Doctor::get();
        return view('pages.dashboard',$data);
    }

    public function profile()
    {
        $data['user'] = Patient::find(Session('loggedUser')->id);
        return view('pages.profile',$data);
    }

    public function password()
    {
        $data['user'] = Patient::find(Session('loggedUser')->id);
        return view('pages.password',$data);
    }

    public function appointment()
    {
        $data['doctors'] = Doctor::get();
        $data['patients'] = Patient::get();
        return view('pages.bookappointment',$data);
    }

    public function checkout(Request $request)
    {   
        $data['patient'] = Patient::find(Session('loggedUser')->id);
        $data['doctor_id'] = explode('-',$request->data)[0];
        $data['doctor'] = Doctor::find($data['doctor_id']);
        $data['day'] = explode('-',$request->data)[1];
        $data['date'] = $request->date;
        return view('pages.checkout', $data);
    }

    public function confirmation(Request $request)
    {   
        $validate = Validator::make($request->all(), [
            'patient_id' => 'required|max:10',
            'doctor_id' => 'required|max:10',
            'day' => 'required|date',
            'name' => 'required|max:100',
            'name1' => 'required|max:100',
            'age' => 'required',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'note' => 'required|max:50',
            'payment' => 'required',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }

        $insert = new Appointment();
        $insert->patient_id = $request->patient_id;
        $insert->doctor_id = $request->doctor_id;
        $insert->serial = Appointment::count() + 1;
        $insert->appt_date = $request->day;
        $insert->patient_name = $request->name;
        $insert->doctor_name = $request->name1;
        $insert->age = $request->age;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->address = $request->address;
        $insert->note = $request->note;
        $insert->payment = $request->payment;
        $insert->status = 'pending';
        $insert->save();
        return redirect('booking/success')->with('success', 'Booked successfully!');
    }

    public function success()
    {
        $data['appointment'] = Appointment::where('patient_id', Session('loggedUser')->patient_id)->get();
        return view('pages.bookingsuccess',$data);
    }

    public function token($id)
    {
        $data['appointment'] = Appointment::where('id',$id)->first();
        return view('pages.token',$data);
    }

    public function prescription($id)
    {
        $data['appointment'] = Appointment::where('id',$id)->first();
        $data['medicine'] = Medicine::find($data['appointment']->id);
        return view('pages.prescription',$data);
    }

    public function search()
    {
        $data['doctors'] = Doctor::get();
        return view('pages.search', $data);
    }

    public function index()
    {
        if(Session::has('loggedUser')) return back();
        return view('pages.login');
    }

    public function registration()
    {
        return view('pages.register');
    }

    public function login(Request $request)
    {
        $fields = $request->get('options');
        if ($fields == 'doctor') {
            $validator = Validator::make($request->all(), [ 
                'email' => 'required|email|max:50',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
            ]);
            
            if($validator->fails()){   
                return back()->withErrors($validator)->withInput(); 
            }
    
            $user = Doctor::where('email', $request->email)->first();
            if ($user != null && Hash::check($request->password, $user->password)) {
                $request->session()->put('loggedUser', $user);
                return redirect('doctor/dashboard')->with('message', 'Log In Successfully');
            }
            else{
                return back()->with('warning', 'Wrong Email/Password!');
            }
        } else {
            $validator = Validator::make($request->all(), [ 
                'email' => 'required|email|max:50',
                'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
            ]);
            
            if($validator->fails()){   
                return back()->withErrors($validator)->withInput(); 
            }
    
            $user = Patient::where('email', $request->email)->first();
            if ($user != null && Hash::check($request->password, $user->password)) {
                $request->session()->put('loggedUser', $user);
                return redirect('/')->with('success', 'Log In Successfully');
            }
            else{
                return back()->with('warning', 'Wrong Email/Password!');
            }
        }
        
    }
    public function store(Request $request)
    {   
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'patient_id' => 'unique:patients,patient_id|required|max:10',
            'address' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'required|mimes:jpeg,png,jpg|max:1024',
            'blood_grp' => 'required|max:10',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|same:cpassword|max:100',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $insert = new Patient();
        $insert->name = $request->name;
        $insert->dob = $request->dob;
        $insert->age = $age;
        $insert->address = $request->address;
        $insert->patient_id = $request->patient_id;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->image = $request->image;
        $insert->blood_grp = $request->blood_grp;
        $insert->total_visit = 0; 
        $insert->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $photo = $request->image;
            $photo_name = time().rand(111,999).'.'.$photo->getClientOriginalExtension();
            $resize_image = Image::make($photo->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('/photos/').$photo_name);
            $insert->image = $photo_name;
        }
        $insert->save();
        return redirect('login')->with('success', 'Registered successfully!');
    }            

    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'address' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
            'blood_grp' => 'required|max:10',
        ]);
        if($validate->fails()){ 
            dd($validate);
            return back()->withErrors($validate)->withInput();
        }

        $update = Patient::find($request->id);
        $update->name = $request->name;
        $update->dob = $request->dob;
        $update->age = Carbon::parse($request['dob'])->age;
        $update->address = $request->address;
        $update->email = $request->email;
        $update->mobile = $request->mobile;
        $update->blood_grp = $request->blood_grp;
        if ($request->hasFile('image')) {
            // unlink photo
            if(file_exists(public_path('/photos/') .$update->image)){
                unlink(public_path('/photos/') .$update->image);
            };
            $photo = $request->image;
            $photo_name = time().rand(111,999).'.'.$photo->getClientOriginalExtension();
            $resize_image = Image::make($photo->getRealPath());
            $resize_image->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            })->save(public_path('/photos/') .$photo_name);
            $update->image = $photo_name;
        }
        if($update->isDirty()) {
            $update->save();
            return back()->with('success', 'Post updated successfully!');
        }
        return back()->with('warning', 'Nothing changed!');
    }

    public function changePass(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'oldpassword' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|same:cpassword|max:100',
        ]);
        if($validate->fails()){   return back()->withErrors($validate)->withInput(); }

        $user = Patient::find($request->id);
        if(Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
        }
        return back()->with('error', 'Password is not changed!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('login')->with('success', 'Log Out Successfully',);
    }
}
