@extends('users.layout')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="alert alert-success">
                <h4>Please log yourself in order to continue. If you don't have account, please register first. </h4>
            </div>
            <div class="float-right">

                <a class="btn btn-success" href="{{route('users.index')}}">Go back</a>
            </div>
        </div>
    </div>
    @if($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{route('users.validate1')}}" method="post">
        {{csrf_field()}}
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control loginFields" name="email" required
                                       autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control loginFields" name="password" required>
                            </div>
                            <div class="form-group mb-3" hidden="true">
                                <label>
                                    <input name="request" value="{{$request}}">
                                </label>

                            </div>
                            <div class="d-grid mx-auto" id="loginFieldButton">
                                <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
