@extends("admintemp")
@section("title","Actor Page")
@section("content")

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Actor</h2>
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
    <form action="{{ route('actors.store') }}" method="POST" >
        @csrf

        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-12">
                <div class="form-group">
                    <strong>name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>bio:</strong>
                    <input type="text" class="form-control" style="height:50px" name="bio"
                        placeholder="bio">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>birthdate:</strong>
                    <input type="date" name="birthdate" class="form-control" placeholder="birthdate">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>listmovies:</strong>
                    <input type="text" name="listmovies" class="form-control" placeholder="listmovies">
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

</form>

@endsection