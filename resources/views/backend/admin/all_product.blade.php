@extends('backend.layout')
@section('content')
    <!-- start: Content -->
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><span class="break"></span>Categories</h2>
    </div>
    <?php
        $message = Session::get('message');
            if($message){
            echo  '<p class="alert alert-success">'. $message. '</p>';
                Session::put('message',null);
            }
    ?>
    <div class="box-content">
        <table class="table table-striped table-bordered bootstrap-datatable datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Manufacturer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>   
            @foreach($allProduct as $product)
                <tbody>
                <tr>
                    <td>{{$product->product_id}}</td>
                    <td class="center">{{$product->product_name}}</td>
                    <td><img src="{{URL::to($product->product_image)}}" alt=""style="width: 100%; height: 80px;"></td>
                    <td class="center">{{$product->product_price}}</td>
                    <td class="center">{{$product->category_name}}</td>
                    <td class="center">{{$product->manufacturer_name}}</td>
                    <td class="center">
                        @if($product->pub_status==1)
                            <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($product->pub_status==1)
                            <a class="btn btn-danger" href=" {{URL::to('/inactive-product/'.$product->product_id)}} ">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                        @else
                            <a class="btn btn-success" href="{{URL::to('/active-product/'.$product->product_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                        @endif
                        <a class="btn btn-info" href="{{URL::to('/edit-product/'.$product->product_id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger"  href="{{URL::to('/delete-product/'.$product->product_id)}}">
                            <i class="halflings-icon white trash"></i> 
                        </a>
                    </td>
                </tr>               
                </tbody>
            @endforeach
        </table>            
    </div>
</div>
@endsection