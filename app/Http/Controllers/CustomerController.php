<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\contract;
use App\Models\contract_detail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class CustomerController extends Controller
{
    //READ
    public function customerindex(){
        $customerlist = user::all();
        return view ('customer.index',compact('customerlist'));
    }

    
    //PROFILE
    public function customerprofile(){
        $customerlist = user::where('id', Auth::id())->get();
        return view ('customer.profile',compact('customerlist'));
    }

    //UPDATE
    public function UpdateCustomer(){
        $customerlist = user::find(Auth::id());
        return view('customer.update',compact('customerlist'));    
    }

    public function UpdateCustomerProcess(Request $request){
        $customerlist = user::find(Auth::id());
        $customerlist->name = $request -> input('txtcName');
        $customerlist->dob = $request -> input('txtcDOB');
        $customerlist->address = $request -> input('txtcAdd');
        $customerlist->email = $request -> input('txtcMail');
        $customerlist->phone = $request -> input('txtcPhone');
        $customerlist->update();
        
        return redirect()->back()->with('success','Customer Information updated successfully'); 
    }

    //INDEX EDIT
    public function IndexEdit($id){
        $customerlist = user::find($id);
        return view('Customer.indexedit',compact('customerlist'));
    }

    public function EditProcess($id){
        $customerlist = user::find($id);
        $customerlist->name = $request -> input('txtcName');
        $customerlist->dob = $request -> input('txtcDOB');
        $customerlist->address = $request -> input('txtcAdd');
        $customerlist->email = $request -> input('txtcMail');
        $customerlist->phone = $request -> input('txtcPhone');
        $customerlist->update();
        
        return redirect()->back()->with('success','Customer Information updated successfully'); 
    }

    //INDEX DELETE
    public function CustomerDelte($id){
        $customerlist = user::find($id);
        $customerlist->delete();

        return redirect()->back()->with('status','Car deleted successfully');
    }

    //UPDATE PASSWORD
    public function UpdatePassword() {
        $customerlist = user::find(Auth::id());
        return view('customer.updatepass',compact('customerlist'));
    }
 
    public function UpdatePasswordProcess(Request $request)
    {
        $customerlist = user::find(Auth::id());
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();
 
        return back()->with('success', 'Your password has been changed!');
 
    }

    //MY BOOKING
    public function myBooking(){
        $customerlist = user::where('id', Auth::id())->get();
        $contract = contract::where('CusID',Auth::id())->get();
        $contractno = contract::where('CusID',Auth::id())->value('ContractNo');
        $detail = contract_detail::where('ContractNo',$contractno)->get();
        return view ('customer.booking', array('contract' => $contract, 'detail' => $detail, 'customerlist' => $customerlist));
    }
    

}
