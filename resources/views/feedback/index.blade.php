@extends('layout.layout2')
@section('title','Feedback Index')
@section('my content')

<div class="container small-index text-center">
    <a href=" {{ url('carindex') }} " title="Car Index"><i class="bx bx-car"></i></a><span style="color: #e43c5c"> |</span>   
    <a href=" {{ url('driverindex') }} " title="Driver Index"><i class="bx bx-run"></i></a><span style="color: #e43c5c"> |</span>
    <a href=" {{ url('staffindex') }} " title="Staff Index"><i class="bx bx-group"></i></a><span style="color: #e43c5c"> |</span>
    <a href=" {{ url('customerindex') }} " title="Customer Index"><i class="bx bx-cart-alt"></i></a><span style="color: #e43c5c"> |</span>
    <a href=" {{ url('feedbackindex') }} " title="Feedback Index"><i class="bx bx-user-voice"></i></a><span style="color: #e43c5c"> |</span>
    <a href=" {{ url('contractindex') }} " title="Contract Index"><i class="bx bx-file"></i></a><span style="color: #e43c5c"> |</span>
    <a href=" {{ url('maintenanceindex') }} " title="Maintenance Index"><i class="bx bx-cog"></i></a><span style="color: #e43c5c"> |</span> 
    <a href=" {{ url('brandindex') }} " title="Brand Index"><i class="bx bx-purchase-tag"></i></a>           
</div>

<div class="container" style="margin-top: 70px; margin-bottom: 100px">
    <h1 style="text-align: center; color: #e43c5c">FEEDBACK INDEX</h1>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr style="text-align: center">
                        <th>ID</th>
                        <th>Customer ID</th>
                        <th>Contract Number</th>
                        <th>Driver Attitude</th>
                        <th>Driver Punctuality</th>
                        <th>Reasonable Price</th>
                        <th>More Comments</th>
                        <th>Function</th>

                    </tr>
                </thead>    
                <tbody>
                    @foreach($feedbacklist as $list)
                    <tr>
                        <td>{{ $list -> FeedbackID }}</td>
                        <td>{{ $list -> Cus_ID }}</td>
                        <td>{{ $list -> ContractNo }}</td>
                        <td>{{ $list -> DriverAttitude }}</td>
                        <td>{{ $list -> Punctuality }}</td>
                        <td>{{ $list -> ReasonalPrice }}</td>
                        <td>{{ $list -> Comment }}</td>
                        
                        <td>
                            <a href="{{ url('feedbackdelete/'.$list->FeedbackID) }}" class="btn btn-danger btn-sm" onclick = "return confirm('Are you sure to delete car {{$list->CarPlate}}? ')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        
</div>

@endsection
        
    
