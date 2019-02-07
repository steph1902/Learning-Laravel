<!-- carindex.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <h3> <a href="{{url('add')}}">Add more car</a> </h3><br>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Company</th>
            <th>Model</th>
            <th>Price</th>
            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($cars as $car)
            <tr>
                <td>{{$car->id}}</td>
                <td>{{$car->carcompany}}</td>
                <td>{{$car->model}}</td>
                <td>{{$car->price}}</td>
                <td><a href="{{action('CarController@edit', $car->id)}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('CarController@destroy', $car->id)}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
