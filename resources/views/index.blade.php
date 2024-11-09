<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Document</title>
</head>
<body>
    <div>
        Sorting by <a href="{{route("products", ['sb'=>'name', 'dir'=>'asc'])}}">Name</a> <a href="{{route("products", ['sb'=>'price', 'dir'=>'asc'])}}">Price</a>
    </div>

    <div>
        <table>
            <tr>
                <th><a href="{{route("products", ['sb'=>'id',           'dir'=>'asc'])}}">  ID          </a></th>
                <th>Product Id</th>
                <th><a href="{{route("products", ['sb'=>'name',         'dir'=>'asc'])}}">  Name        </a></th>
                <th>Discription</th>
                <th><a href="{{route("products", ['sb'=>'price',        'dir'=>'asc'])}}">  Price       </a></th>
                <th><a href="{{route("products", ['sb'=>'stock',        'dir'=>'asc'])}}">  Stock       </a></th>
                <th>Image</th>
            </tr>
            @foreach ($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->product_id}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->stock}}</td>
                    <td>{{$row->image}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        {{$data->links()}}
    </div>
    
</body>
</html>