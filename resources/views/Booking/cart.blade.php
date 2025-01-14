@extends('layout.layout2')
@section('title','My Cart')
@section('my content')


    <div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <h1 style="text-align: center; color: #e43c5c">MY CART</h1>
         @if(session('status'))
        <h3 style="color: red" >{{session('status')}}</h3>
        @endif
        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:35%">Car Ordered</th>
                <th style="width:15%">Car Plate</th>
                <th style="width:10%">Price</th>
                <th style="width:18%">No. of days</th>
                <th style="width:17%" class="text-center">Subtotal</th>
                <th style="width:5%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0 ?>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <?php $total += $details['CarPrice'] * $details['quantity'] ?>
                    <tr>
                        <td data-th="CarBrand">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset('uploads/carlist/'.$details['CarPic']) }}" width="130x" height="70px" alt="CarImage" width="100" height="100" class="img-responsive"/></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $details['CarBrand'] }} {{ $details['CarModel'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="CarPlate">{{ $details['CarPlate'] }}</td>
                        <td data-th="CarPrice">${{ $details['CarPrice'] }}</td>
                        <td data-th="quantity">
                            {{ $details['quantity'] }}
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['CarPrice'] * $details['quantity'] }}</td>
                        <td class="actions" data-th="">

                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <tfoot>

            <tr>
                <td><a href="{{ url('booking') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Book another car</a></td>
                
                <td colspan="2" class="hidden-xs"></td>
                <td></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
                <form action="{{ url('checkoutcart') }}" method="post">
                    @csrf
                <td><button type="submit" class="btn btn-primary"><i class="fa fa-angle-right"></i> Checkout</button></td>
                </form>
                
            </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('script-section')
        <script type="text/javascript">
            $(".update-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
                $.ajax({
                url: '{{ url('update-cart') }}',
                method: "patch",
                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val()},
                success: function (response) {
                    window.location.reload();
                }
                });
            });

            $(".remove-from-cart").click(function (e) {
                e.preventDefault();
                var ele = $(this);
                if(confirm("Are you sure")) {
                    $.ajax({
                        url: '{{ url('remove-from-cart') }}',
                        method: "DELETE",
                        data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>

@endsection