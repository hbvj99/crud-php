@extends('layouts.master')
@section('content')
    @if(session('success'))
        <div class="container">
            <div class="row">
                <div class="alert alert-success">
                    <strong> {{session('success')}}</strong>
                </div>
            </div>
    @endif
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <form action="{{route('edit_action')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="userid" id="userid" value="{{$edit_record->cid}}">
                            <div class="form-group">
                                <label for="username">
                                    Customer Name
                                </label>
                                <input type="text" name="customerName" value="{{$edit_record->customerName}}" id="customerName" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('customerName')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="address">
                                    Address
                                </label>
                                <input type="text" name="address" value="{{$edit_record->address}}" id="address" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('address')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="organization">
                                    Organization
                                </label>
                                <input type="text" name="organization" value="{{$edit_record->organization}}" id="organization" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('organization')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <input type="text" name="email" value="{{$edit_record->email}}" id="email" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('email')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="phone">
                                    Mobile
                                </label>
                                <input type="text" name="mobile" value="{{$edit_record->mobile}}" id="mobile" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('mobile')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="imageProfile">
                                    Customer Photo
                                </label>
                                <input type="file" name="image" placeholder="Choose a file" id="imageId" class="btn btn-default">
                                <a href="" style="color: red;">{{$errors->first('image')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img src="{{url('lib/image/'.$edit_record->image)}}" alt="No Image" class="img-responsive thumbnail" style="margin-top: 20px">
                    </div>
                </div>
            </div>
        </div>
@stop