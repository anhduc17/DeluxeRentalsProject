@extends('layout.layout2')
@section('title', 'Create Feedback')
@section('my content')
<div class="container" style="margin-top: 100px; margin-bottom: 100px">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-md-2 col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            @if(session('status'))
                                <h3>{{session('status')}}</h3>
                            @endif
                            <h3 class="card-title">NEW FEEDBACK CREATION</h3>
                            
                        </div>
                        <div class="card-body">
                        <form method="POST" action="{{ url('feedbackcreate/'.$contractno)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="contract_id" value="{{}}">
                            <div class="form-group">
                                <label><b> Driver Attitude</b></label>
                                <div class="rating-css">
                                        <div class="star-icon">
                                            <input type="radio" value="1" name="att_rating" checked id="rating1">
                                            <label for="rating1" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="att_rating" id="rating2">
                                            <label for="rating2" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="att_rating" id="rating3">
                                            <label for="rating3" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="att_rating" id="rating4">
                                            <label for="rating4" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="att_rating" id="rating5">
                                            <label for="rating5" class="fa fa-star"></label>
                                        </div>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label><b>Driver Punctuality</b> </label>
                                <div class="rating-css">
                                        <div class="star-icon">
                                            <input type="radio" value="1" name="punc_rating" checked id="rating6">
                                            <label for="rating6" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="punc_rating" id="rating7">
                                            <label for="rating7" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="punc_rating" id="rating8">
                                            <label for="rating8" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="punc_rating" id="rating9">
                                            <label for="rating9" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="punc_rating" id="rating10">
                                            <label for="rating10" class="fa fa-star"></label>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                    <label><b> Reasonable Price</b></label>
                                <div class="rating-css">
                                        <div class="star-icon">
                                            <input type="radio" value="1" name="price_rating" checked id="rating11">
                                            <label for="rating11" class="fa fa-star"></label>
                                            <input type="radio" value="2" name="price_rating" id="rating12">
                                            <label for="rating12" class="fa fa-star"></label>
                                            <input type="radio" value="3" name="price_rating" id="rating13">
                                            <label for="rating13" class="fa fa-star"></label>
                                            <input type="radio" value="4" name="price_rating" id="rating14">
                                            <label for="rating14" class="fa fa-star"></label>
                                            <input type="radio" value="5" name="price_rating" id="rating15">
                                            <label for="rating15" class="fa fa-star"></label>
                                        </div>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label>More Comment</label>
                                <input type="text" class="form-control" name="txtComment" placeholder="More comments">
                            </div>                                
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>                        
                    </div>                    
                    <!-- /.card -->
                </div>
            </div>
        </div>
        
    </section>
</div>
   
@endsection