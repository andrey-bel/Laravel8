<html lang="en">
<body>
<table>
    <tr>
        <td>id</td>
        <td>name</td>
        <td>description</td>
        <td>order_id</td>
    </tr>
    @foreach ($goodsList as $goods)
        <tr>
        <td>{{ $goods['id'] }}</td>
        <td>{{ $goods['name'] }}</td>
        <td>{{ $goods['description'] }}</td>
        <td>{{ $goods['order_id'] }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
