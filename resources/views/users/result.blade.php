@extends('users.layout')


@section('content')
    <div>
        <div class="text-center">
            <a class="btn btn-success" href="{{route('users.index')}}">Make another search</a>
        </div>
    </div>
<div class="float-left">
    <table class="table">
        <tr>
            <th>User type</th>
        </tr>
        <tr>
            <td> ({{$user_type_count}}) {{$user_type}}</td>
        </tr>
        @foreach($parent_type_count as $parent => $count)
        <tr>
                <td> - ({{$count}}){{$parent}}</td>
        </tr>
        @endforeach
    </table>
</div>
    <div class="float-right">
        <div class="text-center">
            <h4>Results</h4>
        </div>
        <table class="table">
            <tr>
                <th>User type</th> <th>Name</th> <th>Email</th> <th>Sub_type</th>
            </tr>
            @foreach($users_filtered as $user_filtered)
                <tr>
                    <td>
                        {{$user_filtered->user_type}}
                    </td>

                    <td>
                        {{$user_filtered->name}}
                    </td>

                    <td>
                        {{$user_filtered->email}}
                    </td>
                    <td>
                        - {{$user_filtered->sub_type}}
                    </td>
                    <td>
                        <form action="{{route('users.destroy', $user_filtered->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



@endsection
