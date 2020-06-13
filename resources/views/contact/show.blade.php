@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">View Contact
                        <div style="float: right">
                            <a href="{{route('contact.edit',$contact)}}" class="btn btn-outline-secondary">Edit</a>
                        </div>
                        <div style="float: right">
                            <form method="Post" action="{{route('contact.destroy',[$contact])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">

                        <div><img style="float: right" src="/storage/avatars/{{$contact->avatar}}" width="100px"
                                  height="100px"></div>
                        <table>
                            <tr>
                                <td>Name</td>
                                <td>{{$contact->name}}</td>
                            </tr>
                            <tr>
                                <td>Family</td>
                                <td>{{$contact->family}}</td>
                            </tr>
                            <tr>
                                <td>Company &nbsp;&nbsp;</td>
                                <td>{{$contact->company}}</td>
                            </tr>
                            <tr>
                                <td>Job title</td>
                                <td>{{$contact->jobtitle}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$contact->address}}</td>
                            </tr>
                            <tr>
                                <td>Birthday</td>
                                <td>{{$contact->birthday}}</td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td>{{$contact->note}}</td>
                            </tr>

                        </table>

                        @foreach($contact->phones as $phone)
                            <hr>
                            <strong>Phones</strong><br>
                            <div style="float: right">
                                <form method="Post" action="{{route('phone.destroy',[$contact,$phone])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            {{$phone->name}}<br>
                            {{$phone->phone}}<br>
                        @endforeach
                        <br><br>
                        @foreach($contact->emails as $email)
                            <hr>
                            <strong>Emails</strong><br>
                            <div style="float: right">
                                <form method="Post" action="{{route('email.destroy',[$contact,$email])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            {{$email->name}}<br>
                            {{$email->email}}<br>
                        @endforeach
                        <br><br>
                        <form method="post" action="{{route('phone.store',$contact)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter phone label" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="Enter phone number" value="{{old('phone')}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Contact</button>
                        </form>
                        <br><br>
                        <form method="post" action="{{route('email.store',$contact)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Email title</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter email title" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       placeholder="Enter email address" value="{{old('email')}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
