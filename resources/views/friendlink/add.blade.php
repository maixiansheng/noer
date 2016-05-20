@extends('layout.index')
@section('content')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-IE"></i> 友链添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    {{session('error')}}
                    	<form action="/admin/friendlink/insert" method="post" class="mws-form" enctype="multipart/form-data">
                    		@if (count($errors) > 0)
                    		<div class="mws-form-message error">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
                    		</div>
						@endif
                    	
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">友链名称</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="name" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">URL路径</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="url" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">状态</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="status" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                    				<label class="mws-form-label">文章主图</label>
                    				<div class="mws-form-item">
                    					<input type="file" name="logo">
                    				</div>
                    			</div>
                                 <div class="mws-form-row">
                                	<label class="mws-form-label">友链描述</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="descr"class="large">
                                    </div>
                                </div>
                            	
                            </div>
                           <div class="mws-button-row">
                           	{{csrf_field()}}
                           			
                                    <input type="submit" value="提交" class="btn btn-danger">
                                    <input type="reset" value="重置" class="btn ">
                                </div>
                        </form>
                    </div>    	
                </div>




@endsection