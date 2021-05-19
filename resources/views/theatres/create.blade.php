@extends("admintemp")
@section("title","Theatres Page")
@section("content")

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Theatres</h2>
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
    <form action="{{ route('theatres.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-12">
                    <div class="form-group">
                        <strong>Upload Movie Image:</strong>
                        <input type="file" name="movie_img" class="form-control">
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>starttime:</strong>
                    <input type="time" class="form-control" style="height:50px" name="starttime"
                        placeholder="starttime">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>endtime:</strong>
                    <input type="time" name="endtime" class="form-control" placeholder="endtime">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>price:</strong>
                    <input type="number" name="price" class="form-control" placeholder="price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>seatsAvailable:</strong>
                    <input type="number" name="seatsAvailable" class="form-control" placeholder="seatsAvailable">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>seats:</strong>
                    <input type="number" name="seats" class="form-control" placeholder="seats">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</form>

@endsection