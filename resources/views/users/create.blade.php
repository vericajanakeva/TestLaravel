@extends('users.layout')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-right">

                <a class="btn btn-success" href="{{route('users.index')}}">Go back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
            </ul>
        </div>

    @endif
   <form action="{{route('users.store')}}" method="post">
       @csrf
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-md-4">
                   <div class="card">
                       <h3 class="card-header text-center">Register User</h3>
                       <span class="text-center">Select one option from the dropdown list.</span>
                       <div class="card-body">
                           <div class="form-group mb-3">
                               <select name="user_type" class="form-control" id="main">
                                   <option name="type" value="Front End Developer">
                                       Front End Developer
                                   </option>
                                   <option name="type" value="Back End Developer">
                                       Back End Developer
                                   </option>
                               </select>
                               @if ($errors->has('user_type'))
                                   <span class="text-danger">{{ $errors->first('user_type') }}</span>
                               @endif
                           </div>
                           <div class="form-group mb-3">
                               <select name="parent" class="form-control" id="parent">
                               </select>
                               @if ($errors->has('parent'))
                                   <span class="text-danger">{{ $errors->first('parent') }}</span>
                               @endif
                           </div>
                               <div class="form-group mb-3">
                                   <select name="sub_type" class="form-control" id="sub">
                                   </select>
                                   @if ($errors->has('sub_type'))
                                       <span class="text-danger">{{ $errors->first('sub_type') }}</span>
                                   @endif
                               </div>
                               <div class="form-group mb-3">
                                   <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                          required autofocus>
                                   @if ($errors->has('name'))
                                       <span class="text-danger">{{ $errors->first('name') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-3">
                                   <input type="text" placeholder="Email" id="email" class="form-control"
                                          name="email" required autofocus>
                                   @if ($errors->has('email'))
                                       <span class="text-danger">{{ $errors->first('email') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-3">
                                   <input type="password" placeholder="Password" id="password" class="form-control"
                                          name="password" required>
                                   @if ($errors->has('password'))
                                       <span class="text-danger">{{ $errors->first('password') }}</span>
                                   @endif
                               </div>
                           <div class="form-group mb-3">
                               <input type="password" placeholder="Repeat password" id="repeat_password" class="form-control"
                                      name="repeat_password" required>
                               @if ($errors->has('repeat_password'))
                                   <span class="text-danger">{{ $errors->first('repeat_password') }}</span>
                               @endif
                           </div>
                               <div class="d-grid mx-auto">
                                   <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                               </div>

                       </div>
                   </div>
               </div>
           </div>
       </div>



   </form>

@endsection
