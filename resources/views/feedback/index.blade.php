@extends('layout.layout2')
@section('title','Feedback Index')
@section('my content')
<div class="container" style="margin-top: 100px; margin-bottom: 100px">

    <div class="row">
        <div class="col-md-3 col-sm-3">
            <ul>
                <li><a href="{{url('customerindex')}}">Profile Settings</a></li>
                <li><a href="">Update Password</a></li>
                <li><a href="">My Booking</a></li>
                <li><a href="{{url('feedbackindex')}}">Feedback</a></li>
                <li><a href="">Sign Out</a></li>
            </ul>
        </div>
        <div class="col-md-6 col-sm-8">
            <h1>List of feedbacks</h1>
        <h3><a href="{{ url('/feedbackcreate') }}">Add new feedback</a></h3>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Driver Attitude</th>
                    <th>Driver Punctuality</th>
                    <th>Reasonable Price</th>
                    <th>More Comments</th>
                    <th colspan=2>Function</th>

                </tr>
            </thead>    
            
            <tbody>
                @foreach($feedbacklist as $list)
                <tr>
                    <td>{{ $list -> FeedbackID }}</td>
                    <td>{{ $list -> DriverAttitude }}</td>
                    <td>{{ $list -> Punctuality }}</td>
                    <td>{{ $list -> ReasonalPrice }}</td>
                    <td>{{ $list -> Comment }}</td>
                    
                    <td>
                        <a href="{{ url('feedbackupdate/'.$list->FeedbackID) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('feedbackdelete/'.$list->FeedbackID) }}" class="btn btn-danger btn-sm" onclick = "return confirm('Are you sure to delete car {{$list->CarPlate}}? ')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
        </div>
    </div>
        
</div>

@endsection
        
    
