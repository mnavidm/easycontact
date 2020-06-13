@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            <a href="{{route('homeOrdername')}}" class="btn btn-outline-secondary">Order by name</a>
                        </div>
                        <br>

                        @foreach($contacts as $contact)
                            <a href="{{route('contact.show',[$contact])}}"><img
                                    src="/storage/avatars/{{$contact->avatar}}" width="50px" height="50px"> &nbsp;
                                &nbsp; &nbsp; {{$contact->name}} {{$contact->family}}</a><br><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
