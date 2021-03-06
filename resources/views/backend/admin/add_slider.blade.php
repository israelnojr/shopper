@extends('backend.layout')
@section('content')
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><span class="break"></span>Create Slider</h2>
                </div>
                    <?php
                        $message = Session::get('message');
                            if($message){
                            echo  '<p class="alert alert-success">'. $message. '</p>';
                                Session::put('message',null);
                            }
                    ?>
                <div class="box-content">
                    <form class="form-horizontal" action=" {{url('save-slider')}} " method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Slider Name</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="slider_name" required>
                            </div>
                        </div>
                
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Slider Description</label>
                            <div class="controls">
                            <textarea class="cleditor" name="slider_description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Slider Image</label>
                            <div class="controls">
                                <input type="file" name="slider_image">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Redirect To</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="slider_url" placeholder="Must Be URL" required>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                            <input type="checkbox" name="pub_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Slider</button>
                            <a href="{{URL::to('/all-slider')}}" class="btn"> Back</a>
                        </div>
                        </fieldset>
                    </form>   
                </div>
            </div><!--/span-->

        </div><!--/row-->

</div><!--/.fluid-container-->
        <!-- end: Content -->
    </div><!--/#content.span10-->
    </div><!--/fluid-row-->
@endsection