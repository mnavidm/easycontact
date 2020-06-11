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
                    <div class="card-header">View Contact</div>

                    <div class="card-body">
                        <table>
                            <tr><td>Name </td><td>{{$contact->name}}</td></tr>
                            <tr><td>Family </td><td>{{$contact->family}}</td></tr>
                            <tr><td>Company &nbsp;&nbsp;</td><td>{{$contact->company}}</td></tr>
                            <tr><td>Job title </td><td>{{$contact->jobtitle}}</td></tr>
                            <tr><td>Address </td><td>{{$contact->address}}</td></tr>
                            <tr><td>Birthday </td><td>{{$contact->birthday}}</td></tr>
                            <tr><td>Note </td><td>{{$contact->note}}</td></tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
