@extends('backend.layout')
@section('content')
    <!-- start: Content -->
<div class="box span12">
    <div class="box-header" data-original-title>
        <h2><span class="break"></span>Slider</h2>
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
                    <th>Redirect To</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>   
            @foreach($allSlider as $slider)
                <tbody>
                <tr>
                    <td>{{$slider->slider_id}}</td>
                    <td class="center">{{$slider->slider_name}}</td>
                    <td><img src="{{URL::to($slider->slider_image)}}" alt=""style="width: 100%; height: 80px;"></td>
                    <td class="center">{{$slider->slider_url}}</td>
                    <td class="center">{{$slider->created_at}}</td>
                    <td class="center">{{$slider->updated_at}}</td>
                    <td class="center">
                        @if($slider->pub_status==1)
                            <span class="label label-success">Active</span>
                        @else
                        <span class="label label-danger">Inactive</span>
                        @endif
                    </td>
                    <td class="center">
                        @if($slider->pub_status==1)
                            <a class="btn btn-danger" href=" {{URL::to('/inactive-slider/'.$slider->slider_id)}} ">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                        @else
                            <a class="btn btn-success" href="{{URL::to('/active-slider/'.$slider->slider_id)}}">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                        @endif
                        <a class="btn btn-info" href="{{URL::to('/edit-slider/'.$slider->slider_id)}}">
                            <i class="halflings-icon white edit"></i>  
                        </a>
                        <a class="btn btn-danger"  href="{{URL::to('/delete-slider/'.$slider->slider_id)}}">
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