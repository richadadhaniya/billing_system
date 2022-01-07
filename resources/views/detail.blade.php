@extends('layouts.backend.main')

@section('content')




 <div id="right-panel" class="right-panel">

        <!-- Header-->
        
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Data table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background-color:  #264d73">
                                <strong class="card-title" style="color: white">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <form  method="POST" action="" enctype="multipart/form-data">
                                     @csrf
                                      
                                <table>
                                    <thead>
                                       <tr>
                                          <td height="50"><b>Name:</b></td>
                                          <td>{{$add->name}}
                                              
                                            </td>
                                            
                                          </tr>
                                          <tr>
                                          <td height="50"><b>Address:</b></td>
                                          <td>{{$add->address}}
                                             
                                            </td>
                                            
                                          </tr>
                                          
                                          <tr>
                                          <td height="50"><b>Email:</b></td>
                                          <td>{{$add->email}}
                                             
                                            </td>
                                            
                                          </tr>
                                           <tr>
                                          <td height="50"><b>Phone no:</b></td>
                                          <td>{{$add->phone}}
                                             
                                            </td>
                                            
                                          </tr>
                                          
                                         
                                          
                                    </thead>
                                        
                                </table>
                                
                               
                                <table border="1" width="700px">
                                    
                                </table>
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    


 <!Doctype html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  
  <!-- make dynamic input field -->
    <div class="col-md-12"> 
    <form  method="POST" action="{{route('store.bill')}}" enctype="multipart/form-data">
           @csrf 
           <input type="hidden" name="client" value="{{$add->id}}">


        <table class="table table-responsive">
          <thead>

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
                    <option selected disabled>select</option>             
                    @foreach($category as $category)
                       <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach
                                              
                  </select>
                </td>
               
                <td>
                  <input type="text" name="product" class="form-control" placeholder="Product Name">
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
                  <input type="text" name="total" class="form-control " id="subtotal" value="0.00" readonly>
                </td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3"></td>
                <td>
                  <strong>Price:</strong>
                </td>
                <td>
                  <input type="text" name="price" class="form-control" id="vat" placeholder="price">
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



<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

<div class="page-content container">
    <div class="page-header text-blue-d2">
        <h1 class="page-title text-secondary-d1">
            
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                
            </small>
        </h1>

        <div class="page-tools">
           
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">Bill</span>
                             <div class="action-buttons" align="Right">
                
                <a class="btn btn-success btn-light mx-1px text-95" href="{{route('generate.pdf', $add->id)}}" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    PDF
                </a>

            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Name:</span>
                            <span class="text-600 text-110 text-blue align-middle">{{$add->name}}</span>
                        </div>
                        <div class="text-grey-m2">
                            <span class="text-sm text-grey-m2 align-middle">Address:</span>
                            <div class="my-1">
                                {{$add->address}}
                            </div>
                            
                            <div class="my-1">
                            <span class="text-sm text-grey-m2 align-middle">Email:</span>
                                <i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">{{$add->email}}</b></div>
                        </div>
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">Phone:</span>
                            <span>{{$add->phone}}</span>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #111-222</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> Oct 12, 2019</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-2">Category</div>
                        <div class="col-9 col-sm-2">Product</div>
                        <div class="d-none d-sm-block col-4 col-sm-1">Height</div>
                        <div class="d-none d-sm-block col-sm-1">Width</div>
                        <div class="col-1">total</div>
                        <div class="col-1">Price</div>
                         <div class="col-2">Grand total</div>
                        <div class="col-2">Action</div>
                    </div>
                    
                      @foreach($bill as $bill)
                    <div class="row text-600 text-gray py-25">
                        <div class="d-none d-sm-block col-2">{{ $bill->cname }}</div>
                        <div class="col-9 col-sm-2">{{ $bill->product }}</div>
                        <div class="d-none d-sm-block col-4 col-sm-1">{{ $bill->height }}</div>
                        <div class="d-none d-sm-block col-sm-1">{{ $bill->width }}</div>
                        <div class="col-1">{{ $bill->total }}</div>
                        <div class="col-1">{{ $bill->price }}</div>
                         <div class="col-2">{{ $bill->grandtotal }}</div>
                        <div class="col-2">
                          <button type="submit" name="submit" class="btn btn-success"><a href="{{route('edit.bill',$bill->id)}}">Edit</a></button>
                                   <button type="submit" name="submit" class="btn btn-danger"><a href="{{route('delete.bill',$bill->id)}}">Delete</a></button>
                        </div>
                    </div>
                      @endforeach
                     
                
                      
                    <div class="row border-b-2 brc-default-l2"></div>

                   

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                           
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            

                        </div>
                    </div>

                    <hr />

                    <div>
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
  body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}

</style>


   @endsection

