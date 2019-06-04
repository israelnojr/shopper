@extends('backend.layout')
@section('content')
        <div class="row-fluid sortable">
            <div class="box span12">
                <div class="box-header" data-original-title>
                    <h2><span class="break"></span>Create Product</h2>
                </div>
                    <?php
                        $message = Session::get('message');
                            if($message){
                            echo  '<p class="alert alert-success">'. $message. '</p>';
                                Session::put('message',null);
                            }
                    ?>
                <div class="box-content">
                    <form class="form-horizontal" action=" {{url('save-product')}} " method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Name</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="product_name" required>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="selectError3">Category Name</label>
                            <div class="controls">
                                <select id="selectError3" name="category_id">
                                    <option>Select Category</option>
                                    <?php
                                    $publishedCategory = DB::table('tbl_category')->where('publication_status',1)->get();
                                    foreach($publishedCategory as $category){?>
                                        <option value="{{$category->category_id}}" >{{$category->category_name}}</option>	
                                    <?php }?>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="selectError3">Brand Name</label>
                            <div class="controls">
                                <select id="selectError3" name="manufacturer_id">
                                    <option>Select Brand</option>
                                <?php
									$publishedBrand = DB::table('manufacturers')->where('pub_status',1)->get();
									foreach($publishedBrand as $brand){?>
										<option value="{{ $brand->manufacturer_id }}" 'selected' : ''> {{$brand->manufacturer_name}}</option>
									<?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Short Description</label>
                            <div class="controls">
                            <textarea class="cleditor" name="product_short_description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Product Long Description</label>
                            <div class="controls">
                            <textarea class="cleditor" name="product_long_description" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="control-group">
								<label class="control-label">Product Image</label>
								<div class="controls">
								  <input type="file" name="product_image">
								</div>
							  </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Price</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="product_price" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Size</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="product_size" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="date01">Product Color</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" name="product_color" required>
                            </div>
                        </div>
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                            <input type="checkbox" name="pub_status" value="1">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                            <a href="{{URL::to('/all-product')}}" class="btn"> Back</a>
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