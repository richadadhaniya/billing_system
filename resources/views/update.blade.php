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
                                <strong class="card-title" style="color: white">EditClient Table</strong>
                                 
                            </div>
                            <div class="card-body">
                              <form  method="POST" action="{{route('update.client')}}">
                                <input type="hidden" value="{{$add->id}}" name="id">
                                @csrf
                                      
                        <div class="card-body">
                            
                         
                            
                           
                        <div class="row">
                            <div class="form-group col-md-12">
                              <label for="customerDetailsCustomerFullName">Edit name</label>
                               <input type="text" class="form-control"name="name" placeholder="Enter Name" value="">
                               
                            </div>
                        </div>
                         
                        <div class="row">
                            <div class="form-group col-md-12">
                              <label for="customerDetailsCustomerFullName">Edit address</label>
                               <textarea name="address" placeholder="Enter address"></textarea>
                            </div>
                        </div>
                         <div class="row">
                            <div class="form-group col-md-12">
                              <label for="customerDetailsCustomerFullName">Edit email</label>
                               <input type="text" class="form-control"name="email" placeholder="Enter email" value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                              <label for="customerDetailsCustomerFullName">Edit phone</label>
                               <input type="text" class="form-control"name="phone" placeholder="Enter phone" value="">
                            </div>
                        </div>
                         
                         
                      <input type="submit" name="submit" value="SAVE" class="btn btn-success">
                     
                    </div> 
                            </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

   @endsection