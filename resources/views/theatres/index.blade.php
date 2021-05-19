@extends("admintemp")
@section("title","Theatres Page")
@section("content")
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> </h2>
            </div>

            <br>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('theatres.create') }}"> Create theatres
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
            <th>starttime</th>
            <th>endtime</th>
            <th>price</th>
             <th>seatsAvailable</th>
         <th>seats</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($theatres as $theatre)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$theatre->name}}</td>
                <td>{{$theatre->starttime}}</td>
                <td>{{$theatre->endtime}}</td>
                <td>{{$theatre->price}}</td>
                <td>{{$theatre->seatsAvailable}}</td>
                <td>{{$theatre->seats}}</td>
                

                <td>
                    <form action="{{route('theatres.destroy',$theatre->id)}}" method="POST">
                        <button class="btn btn-success">
                       <a href="{{route('theatres.edit',$theatre->id)}}">
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