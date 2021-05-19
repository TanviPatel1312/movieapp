@extends("admintemp")
@section("title","actor Page")
@section("content")
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actor </h2>
            </div>

            <br>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('actors.create') }}"> Create New Actor
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>successfully</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>bio</th>
            <th>birthdate</th>
            <th>listmovies</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($actors as $actor)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$actor->name}}</td>
                <td>{{$actor->bio}}</td>
                <td>{{$actor->birthdate}}</td>
                <td>{{$actor->listmovies}}</td>
              
                

                <td>
                    <form action="{{route('actors.destroy',$actor->id)}}" method="POST">
                        <button class="btn btn-success">
                       <a href="{{route('actors.edit',$actor->id)}}" title="show">
                            Edit</a>
</button>
                        
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



@endsection