@extends('layout.layout2')
@section('title','Customer Account')
@section('my content')

<div class="container" style="margin-top: 100px; margin-bottom: 100px">
<h1 style="text-align: center">My Booking:</h1>
<br>
<br>
<table class="table table-bordered table-hover">  
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <ul>
                <li><a href="{{url('customerprofile')}}">Profile Settings</a></li>
                <form method="POST">
                    @foreach($customerlist as $list)
                    <li><a href="{{url('customerpassupdate/'.$list->id)}}">Update Password</a></li>
                    @endforeach
                </form>
                <li><a href="{{url('mybooking')}}">My Booking</a></li>
                <li><a href="">Sign Out</a></li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-8">
            <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th>ID</th>
                            <th>Contract Number</th>
                            <th>Driver ID</th>
                            <th>Car Plate</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Feedback</th>
                        </tr>
                    </thead>    
                    
                    <tbody>
                        @foreach ($contract as $contractlist)
                            @foreach ($detail as $detaillist)
                            <tr>
                                <td>CUS00{{ $contractlist -> CusID }}</td>
                                <td>{{ $contractlist -> ContractNo }}</td>
                                <td>{{ $detaillist -> DriverID }}</td>
                                <td>{{ $detaillist -> CarPlate }}</td>
                                <td>{{ $detaillist -> Departure }}</td>
                                <td>{{ $detaillist -> Arrival }}</td>
                                <td>
                                    <a href="{{ url('feedbackupdate/'.$list->FeedbackID) }}" class="btn btn-primary btn-sm">Send Feedback</a>
                                </td>
                            </tr>     
                            @endforeach
                        @endforeach
                        
                    </tbody>
            </table>  
        </div>
    </div>

    
</table> 

</div>
 

@endsection