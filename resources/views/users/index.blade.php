@extends('users.layout')


@section('content')
    <div class="row">
        <div id="logged_in" hidden="true">
            <h4>Welcome</h4>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-right" id="loginMenu">
                <a class="btn btn-success" href="{{route('users.create')}}">Register</a>
                <a class="btn btn-success" href="{{route('users.login')}}">Login</a>
            </div>

        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>

    @endif
    <form action="{{route('users.login1')}}" method="post">
      {{ @csrf_field()}}
        <div class="row">
            <h3>Search</h3>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <span>By name or email</span>
                    <input type="search" name="query" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <select name="user_type" class="form-control">
                    <option>
                        Front End Developer
                    </option>
                    <option>
                        Back End Developer
                    </option>
                </select>

            </div>
            <br>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </div>
        </div>
    </form>
    @endsection
