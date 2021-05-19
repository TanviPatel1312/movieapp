@extends("admintemp")
@section("title","Movie Page")
@section("content")


<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Movie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('movies.index')}}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li></li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update',$movie->id)}}" method="POST">
        @csrf
        @method('PUT')

        @if($movie->movie_img)
        <img id="original" src="{{('/movieimg/'.$movie->movie_img)}}" height="70px" width="70px">
        @endif
        <strong>Upload Movie Image:</strong>
         <input type="file" name="movie_img" class="form-control">

         <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="{{$movie->title}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>overview:</strong>
                    <input type="text" class="form-control" style="height:50px" name="overview"
                    value="{{$movie->overview}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Release year:</strong>
                    <input type="number" name="releaseyear" class="form-control" value="{{$movie->releaseyear}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>runtime:</strong>
                    <input type="time" name="runtime" class="form-control" value="{{$movie->runtime}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>castmember:</strong>
                    <input type="text" name="castmembers" class="form-control" value="{{$movie->castmembers}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
