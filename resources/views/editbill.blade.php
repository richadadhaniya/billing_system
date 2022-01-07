@extends('layouts.backend.main')
@section('content')








 <!Doctype html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  
  <!-- make dynamic input field -->
    <div class="col-md-12"> 
    <form  method="POST" action="{{route('update.bill')}}" enctype="multipart/form-data">
           @csrf 
           
        <table class="table table-responsive">
          <thead>
 <input type="text" name="id" value="{{$bill->id}}">
            <tr>
              <th>Category</th>
              <th>Product Name</th>
              <th>Height</th>
              <th>Width</th>
              <th>Total</th>
              
            </tr>
          </thead>
          <tbody class="row_container">
              
              <tr id="">
                <td>
                  <select name="cname">
                                            
                   
                        @foreach($category as $category)
                       <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                                              
                  </select>
                </td>
                
                <td>
                  <input type="text" name="product" value="" class="form-control" placeholder="Product Name">
                </td>         
                <td>
                  <input type="text" name="height" class="form-control" placeholder="Height" id="quantity">
                </td>         
                <td>
                  <input type="text" name="width" class="form-control" placeholder="Width" id="unitprice">
                </td>
                <td>
                  <input type="text" name="total" class="form-control" placeholder="Total" id="total" style="cursor: pointer;" readonly>
                </td>
               
              </tr>
              
          </tbody>
          <tbody>
              <tr>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Total:</strong>
                </td>
                <td>
                  <input type="text" name="total" class="form-control" id="subtotal" value="0.00" readonly>
                </td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Price:</strong>
                </td>
                <td>
                  <input type="text" name="price" class="form-control" id="vat">
                </td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Grand Total:</strong>
                </td>
                <td>
                  <input type="text" name="grandtotal" class="form-control" id="vatsubtotal" value="0.00" readonly>
                </td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  
                </td>
                <td>
                 <button name="submit" value="submit" class="btn btn-success">Submit</button>
                </td>
                <td></td>
              </tr>
              
              
              
             
          </tbody>
        </table>
      </form>
    </div>
  
<script type="text/javascript">
 $(document).ready(function() {

    $("#total").click(function() {
        /*var quantity = document.getElementById("quantity").value;*/
        var quantity = $("#quantity").val();

        var unitprice = $("#unitprice").val();
        var total = (quantity*unitprice);

         $('#total').val(total);
         $('#subtotal').val(total);
        
    });

    $('#vat').change(function() {
      var vInput = this.value;

      var subtotal = $("#subtotal").val();

     

      var vstotal = (parseFloat(subtotal)*parseFloat(vInput)).toFixed(1);
      $('#vatsubtotal').val(vstotal);
      });

   
  
});
  
</script>

</body>
</html>

   @endsection