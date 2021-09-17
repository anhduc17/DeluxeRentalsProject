@extends('layout.layout2')
@section('title','Customer Index')
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

    <h1 style="text-align: center; color: #e43c5c">CUSTOMER INDEX</h1>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr style="text-align: center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>DoB</th>
                    <th>Address</th>
                    <th>Mail</th>
                    <th>Phone</th>
                    <th colspan=2>Function</th>
                </tr>
            </thead>    
            
            <tbody>
                @foreach($customerlist as $list)
                <tr>
                    <td>CUS00{{ $list -> id }}</td>
                    <td>{{ $list -> name }}</td>
                    <td>{{ $list -> dob }}</td>
                    <td>{{ $list -> address }}</td>
                    <td>{{ $list -> email }}</td>
                    <td>{{ $list -> phone }}</td>
                    <td>
                        <a href="{{ url('customeredit/'.$list->id) }}" class="btn btn-dark btn-sm">Edit</a>
                    </td>
                    <td>
                        <a href="{{ url('customerdelete/'.$list->id) }}" class="btn btn-danger btn-sm" 
                        onclick = "return confirm('Are you sure to delete data of customer? {{$list->id}}? ')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
</div>

@endsection
        



