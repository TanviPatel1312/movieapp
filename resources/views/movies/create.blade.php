@extends("admintemp")
@section("title","Movie Page")
@section("content")

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Movie</h2>
            </div>
            
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong> 
            <ul>
                @foreach($errors->all() as $error)
                    
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <strong>Upload Movie Image:</strong>
         <input type="file" name="movie_img" class="form-control">
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="title">
                </div>
            </div>
            <!-- <div class="col-xs-8 col-sm-8 col-md-12">
                <div class="form-group">
                    <strong>aid:</strong>
                    <input type="text" name="aid" class="form-control" placeholder="actor">
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>overview:</strong>
                    <input type="text" class="form-control" style="height:50px" name="overview"
                        placeholder="overview">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Release year:</strong>
                    <input type="number" name="releaseyear" class="form-control" placeholder="release year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>runtime:</strong>
                    <input type="time" name="runtime" class="form-control" placeholder="runtime">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>castmember:</strong>
                    <input type="text" name="castmembers" class="form-control" placeholder="castmember">
                </div>
            </div>
           
                
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</form>

@endsection