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
                        <form action="{{route('add')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="customerName">
                                    Customer Name
                                </label>
                                <input type="text" name="customerName" id="customerName" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('customerName')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="address">
                                    Address
                                </label>
                                <input type="text" name="address" id="address" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('address')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="organization">
                                    Organization
                                </label>
                                <input type="text" name="organization" id="organization" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('organization')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email
                                </label>
                                <input type="text" name="email" id="email" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('email')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="mobile">
                                    Mobile
                                </label>
                                <input type="text" name="mobile" id="mobile" class="form-control">
                                <a href="" style="color: red;">{{$errors->first('mobile')}}</a>
                            </div>
                            <div class="form-group">
                                <label for="image">
                                    Customer Photo
                                </label>
                                <input type="file" name="image" id="image" class="btn btn-default">
                                <a href="" style="color: red;">{{$errors->first('image')}}</a>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Add Record</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-striped">
                            <tr>
                                <th>S.No</th>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Organization</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Image</th>
                                <th>Action</th>
                                <th>Created At</th>
                            </tr>
                            @foreach($userData as $key=>$userDatum)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$userDatum->customerName}}</td>
                                    <td>{{$userDatum->address}}</td>
                                    <td>{{$userDatum->organization}}</td>
                                    <td>{{$userDatum->email}}</td>
                                    <td>{{$userDatum->mobile}}</td>
                                    <td>
                                            <img src="{{url('lib/image/'.$userDatum->image)}}" alt="" width="75" height="80" >
                                    </td>
                                    <td>
                                        <a href="{{route('edit').'/'.$userDatum->cid}}" class="btn btn-primary btn-sm">Edit</a>
                                        &nbsp;&nbsp;&nbsp;

                                        <a href="{{route('delete').'/'.$userDatum->cid}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                    <td>{{$userDatum->created_at}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@stop