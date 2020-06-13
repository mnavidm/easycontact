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
                    <div class="card-header">Edit Contact</div>

                    <div class="card-body">
                        <form method="post" action="{{route('contact.update',$contact)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                       value="{{$contact->name}}">
                            </div>
                            <div class="form-group">
                                <label>Family</label>
                                <input type="text" class="form-control" id="family" name="family"
                                       placeholder="Enter family" value="{{$contact->family}}">
                            </div>
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" class="form-control" id="company" name="company"
                                       placeholder="Enter company" value="{{$contact->company}}">
                            </div>
                            <div class="form-group">
                                <label>Job title</label>
                                <input type="text" class="form-control" id="jobtitle" name="jobtitle"
                                       placeholder="Enter job title" value="{{$contact->jobtitle}}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                       placeholder="Enter address" value="{{$contact->address}}">
                            </div>
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="text" class="form-control" id="birthday" name="birthday"
                                       placeholder="Enter birthday" value="{{$contact->birthday}}">
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Enter note"
                                       value="{{$contact->note}}">
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input type="file" class="form-control" name="avatar" id="avatar">
                            </div>

                            <button type="submit" class="btn btn-primary">Edit Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
