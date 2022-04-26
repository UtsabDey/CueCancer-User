<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Medicine;
use Carbon\Carbon;
use Session;

class DoctorController extends Controller
{
    public function index()
    {
        $data['patient'] = Patient::get();
        $data['appointment'] = Appointment::where('doctor_id', Session('loggedUser')->doctor_id)->get();
        $data['doctor'] = Doctor::get();
        return view('doctors.dashboard',$data);
    }

    public function prescription($id)
    {
        $data['appointment'] = Appointment::where('id',$id)->first();
        $data['patient'] = Patient::find($data['appointment']->patient_id);
        // $data['doctor'] = Doctor::find($data['appointment']->doctor_id);
        $data['medicine'] = Medicine::get();
        return view('doctors.prescription',$data);
    }

    public function pressubmit(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'rules' => 'required|max:100',
            'dose' => 'required|max:50',
            'time' => 'required|max:50',
            'advice' => 'required',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }

        $insert = new Medicine();
        $insert->appt_id = $request->id;
        $insert->doctor_id = $request->doctor_id;
        $insert->patient_id = $request->patient_id;
        $insert->name = $request->name;
        $insert->rules = $request->rules;
        $insert->dose = $request->dose;
        $insert->time = $request->time;
        $insert->advice = $request->advice;
        $insert->save();
        return back()->with('success', 'Medicine prescribed successfully!');
    }

    public function appointment()
    {
        $data['appointment'] = Appointment::where([['status', 'pending'],['doctor_id', Session('loggedUser')->doctor_id]])->get();
        return view('doctors.appointment',$data);
    }

    public function addschedule()
    {
        $data['user'] = Doctor::find(Session('loggedUser')->id);
        return view('doctors.addschedule',$data);
    }

    public function profile()
    {
        $data['user'] = Doctor::find(Session('loggedUser')->id);
        return view('doctors.profile',$data);
    }

    public function accept($id)
    {
        $update = Appointment::find($id);
        $update->status = 'approved';
        $update->save();
        return back()->with('success', 'Status updated successfully!');
    }

    public function password()
    {
        $data['user'] = Doctor::find(Session('loggedUser')->id);
        return view('doctors.password',$data);
    }

    public function add()
    {
        return view('doctors.add');
    }

    public function mypatient()
    {
        $data['patient'] = Patient::all();
        return view('doctors.mypatient',$data);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'doctor_id' => 'unique:doctors,doctor_id|required|max:10',
            'address' => 'required',
            'speciality' => 'required',
            'dob' => 'required|date',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'blood_grp' => 'required|max:10',
            'from' => 'required',
            'to' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'password' => 'required|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/|max:100',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }
        $dob = Carbon::parse($request['dob']);
        $age = $dob->age;

        $insert = new Doctor();
        $insert->name = $request->name;
        $insert->dob = $request->dob;
        $insert->age = $age;
        $insert->speciality = $request->speciality;
        $insert->address = $request->address;
        $insert->doctor_id = $request->doctor_id;
        $insert->email = $request->email;
        $insert->mobile = $request->mobile;
        $insert->image = $request->image;
        $insert->blood_grp = $request->blood_grp;
        $insert->fee = $request->fee;
        $insert->day = $request->from.','.$request->to;
        $insert->time = $request->time_from.','.$request->time_to;
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
        return back()->with('success', 'Doctor Registered successfully!');
    }

    public function update(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'address' => 'required',
            'speciality' => 'required|max:50',
            'dob' => 'required|date',
            'email' => 'required|email|max:50',
            'mobile' => 'required|numeric|digits:11|regex:/(01)[0-9]{9}/',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
            'blood_grp' => 'required|max:10',
        ]);
        if($validate->fails()){ 
            return back()->withErrors($validate)->withInput();
        }

        $update = Doctor::find($request->id);
        $update->name = $request->name;
        $update->dob = $request->dob;
        $update->age = Carbon::parse($request['dob'])->age;
        $update->speciality = $request->speciality;
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

        $user = Doctor::find($request->id);
        if(Hash::check($request->oldpassword, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Password changed successfully!');
        }
        return back()->with('error', 'Password is not changed!');
    }
}
