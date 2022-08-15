<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Currency Favourite List</title>
</head>
<body>

<form action="" method="POST">
    @csrf <!-- {{ csrf_field() }} -->
    <select name="currancy" id="pet-select">
        @foreach($posts as $post)
            <option value="{{$post["code"]."|".$post["currency"]."|".$post["mid"]}}">{{$post["currency"]}}</option>
        @endforeach
    </select>
    <input type="submit" value="Add" >
</form>

<table>
    <thead>
    <td>Currency</td>
    <td>Code</td>
    <td>Mid</td>
    <td><a href="?action=deleteAll"><input type="submit" value="Delete All"></a></td>
    <td></td>
    </thead>

    <tbody>
    @foreach(Cache::get('favourite') as $key => $post)
        <tr>
            <td>{{$post["code"]}}</td>
            <td>{{$post["currency"]}}</td>
            <td>{{$post["mid"]}}</td>
            <td>
                <a href="?action=delete&id={{$key}}"><input type="submit" onclick="return confirm('Are you sure you would like to delete {{$post["currency"]}}? ');" value="Delete"></a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
