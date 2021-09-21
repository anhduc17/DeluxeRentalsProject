<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\feedback;
use App\Models\contract;
use App\Models\contract_detail;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Hash;

class FeedbackController extends Controller
{
    //READ
    public function feedbackindex(){
        $feedbacklist = feedback::all();
        return view ('feedback.index',compact('feedbacklist'));
    }
    
    //CREATE
    public function feedbackcreate($id){
        $contractno = contract::where('CusID',Auth::id())->where('ContractNo',$id)
                    ->value('ContractNo');
        return view ('feedback.create',compact('contractno'));
    }
    
    public function feedbackcreateprocess(Request $request,$id){
        $contractno = contract::where('CusID',Auth::id())->where('ContractNo',$id)
                    ->value('ContractNo');
        $driver_att = $request -> input('att_rating');
        $driver_punc = $request -> input('punc_rating');
        $reason_price = $request -> input('price_rating');
        $comment = $request -> input('txtComment');
        

        $existing_feedback = feedback::where('Cus_ID', Auth::id())->where('ContractNo',$contractno)->first();
        if($existing_feedback)
        {
            $existing_feedback->DriverAttitude = $driver_att;
            $existing_feedback->Punctuality = $driver_punc;
            $existing_feedback->ReasonalPrice = $reason_price;
            $existing_feedback->Comment = $comment;
            $existing_feedback->update();
        }
        else{
            feedback::create([
                'Cus_ID' => Auth::id(),
                'ContractNo' => $contractno,
                'DriverAttitude' => $driver_att,
                'Punctuality' => $driver_punc,
                'ReasonalPrice' => $reason_price,
                'Comment' => $comment
            ]);
        }
           
        return redirect('mybooking')->with('status',"Feedback Done");
    }
    
    //DELETE
    public function DeleteFeedback($fid){
        $feedback = feedback::find($fid);
        $feedback->delete();

        return redirect()->back()->with('status','Feedback deleted successfully');
    }
}

