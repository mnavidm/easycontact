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
                    <div class="card-header">Add Contact</div>

                    <div class="card-body">
                        <form method="post" action="{{route('contact.store')}}">
                            @csrf
                            <div class="form-group">
                                <label >Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label >Family</label>
                                <input type="text" class="form-control" id="family" name="family" placeholder="Enter family" value="{{old('family')}}">
                            </div>
                            <div class="form-group">
                                <label >Company</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="Enter company" value="{{old('company')}}">
                            </div>
                            <div class="form-group">
                                <label >Job title</label>
                                <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Enter job title" value="{{old('jobtitle')}}">
                            </div>
                            <div class="form-group">
                                <label >Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" value="{{old('address')}}">
                            </div>
                            <div class="form-group">
                                <label >Birthday</label>
                                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Enter birthday" value="{{old('birthday')}}">
                            </div>
                            <div class="form-group">
                                <label >Birthday</label>
                                <input type="text" class="form-control" id="note" name="note" placeholder="Enter note" value="{{old('note')}}">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Contact</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
