<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Document</title>
</head>
<body>

@if ($data!=null)

    <div>
        <table>
            <tr>
                <th>ID</th>
                <th>Product Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->product_id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->description}}</td>
                <td>{{$data->price}}</td>
                <td>{{$data->image}}</td>
            </tr>
        </table>
    </div>

    <div>
        <form method="POST" action={{route('delete', $data->id)}} > <!--enctype="multipart/form-data" -->
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" style="color:red">

        </form>
    </div>

@else
    <div>
        <h1>No Data Found</h1>
    </div>
@endif

</body>
</html>