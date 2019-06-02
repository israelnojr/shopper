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
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>   
            @foreach($allCategory as $category)
                <tbody>
                <tr>
                    <td>{{$category->category_id}}</td>
                    <td class="center">{{$category->category_name}}</td>
                    <td class="center">{{$category->category_description}}</td>
                    <td class="center">
                        @if($category->publication_status==1)
                            <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($category->publication_status==1)
                            <a class="btn btn-danger" href=" {{URL::to('/inactive/'.$category->category_id)}} ">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                        @else
                            <a class="btn btn-success" href="{{URL::to('/active/'.$category->category_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                        @endif
                        <a class="btn btn-info" href="{{URL::to('/edit/'.$category->category_id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger"  href="{{URL::to('/delete-category/'.$category->category_id)}}">
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