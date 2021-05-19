@extends("admintemp")
@section("title","Movie Page")
@section("content")
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Movie </h2>
            </div>

            <br>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('movies.create') }}"> Create New Movie
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
            <th>title</th>
            <th>overview</th>
            <th>release year</th>
            <th>runtime</th>
            <th>castmember</th>
            <th>Movie img</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($movies as $movie)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$movie->title}}</td>
                <td>{{$movie->overview}}</td>
                <td>{{$movie->releaseyear}}</td>
                <td>{{$movie->runtime}}</td>
                <td>{{$movie->castmembers}}</td>
                <td><img src="{{('/movieimg/'.$movie->movie_img)}}" class="rounded-circle" height="100px" width="80px"></td>
                

                <td>
                    <form action="{{route('movies.destroy',$movie->id)}}" method="POST">
                        <button class="btn btn-success">
                       <a href="{{route('movies.edit',$movie->id)}}" title="show">
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