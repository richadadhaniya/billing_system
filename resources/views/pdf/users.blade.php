<!DOCTYPE html>
<html>
<head>
	<style>

table {
  border-collapse: collapse;
  width: 100%;
  padding: 20px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: darkcyan;
  color: white;
}
</style>
</head>
<body>

<img src="{{ public_path('images.png') }}" style="height:100px; width: 100px;">
<table>
  <tr>
    <td><b>Name:</b></td>
    <td>{{ $add->name }}</td>
  </tr>
  <tr>
    <td><b>Address:</b></td>
    <td>{{ $add->address }}</td>
  </tr>
  <tr>
    <td><b>Email:</b></td>
    <td>{{ $add->email }}</td>
  </tr>
  <tr>
    <td><b>Phone:</b></td>
    <td>{{ $add->phone }}</td>
  </tr>
</table>

<table>
  <tr>
    <th>Category</th>
    <th>Product</th>
    <th>Height</th>
    <th>Width</th>
    <th>Total</th>
    <th>Price</th>
    <th>Grand total</th>
  </tr>

  @foreach($users as $userss)
  <tr>
    <td>{{ $userss->cname }}</td>
    <td>{{ $userss->product }}</td>
    <td>{{ $userss->height }}</td>
    <td>{{ $userss->width }}</td>
    <td>{{ $userss->total }}</td>
    <td>{{ $userss->price }}</td>
    <td>{{ $userss->grandtotal }}</td>
  </tr>
  @endforeach
   <?php
                             $mtotal = 0;
                            foreach ($users as $bills){
                            $mtotal += $bills->grandtotal;
                             }
                            $mtotal = 0+$mtotal;
                      ?>
                      
                    <tr>
                        <td colspan="6" class="text-right"><b>Main Total</b>&emsp;&emsp;</td>
                        <td> <b>{{$mtotal}}</b></td>
                    </tr> 
</table>

</body>
</html>