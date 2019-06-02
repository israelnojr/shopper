@extends('backend.layout')
@section('content')
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><span class="break"></span>Edit Category</h2>
                </div>
                    <?php
                        $message = Session::get('message');
                            if($message){
                            echo  '<p class="alert alert-success">'. $message. '</p>';
                                Session::put('message',null);
                            }
                    ?>
                <div class="box-content">
                    <form class="form-horizontal" action=" {{url('update-category/'.$categoryInfo->category_id)}} " method="post">
                        {{csrf_field()}}
                        <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Category Name</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="category_name" value="{{$categoryInfo->category_name}}" required>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                            <textarea class="cleditor" name="category_description" rows="3"  required>{{$categoryInfo->category_description}}</textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                            <input type="checkbox" name="publication_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                            <a href=" {{URL::to('/all-category')}} " class="btn"> Back</a>
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