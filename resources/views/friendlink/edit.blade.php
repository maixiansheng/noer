@extends('layout.index')
@section('content')
	
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>友链修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                      {{session('error')}}
                    	
                    		@if (count($errors) > 0)
                    		<div class="mws-form-message error">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
                    		</div>
						@endif
                    	<form action="{{url('admin/friendlink/update')}}" method="post" class="mws-form"  enctype="multipart/form-data">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友链标题</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="name" value="{{$friendlink['name']}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友链描述</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name="descr"value="{{$friendlink['descr']}}">
                    				</div>
                    			</div>
                    			
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友链URL</label>
                    				<div class="mws-form-item">
                                            <input type="text" class="small" name="url" value="{{$friendlink['url']}}">
                    					
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友链状态</label>
                    				<div class="mws-form-item">
                    					 <input type="text" class="small" name="status" value="{{$friendlink['status']}}">
                    				</div>
                    			</div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">友链LOGO</label>
                    				<div class="mws-form-item">
                                        <img src="{{$friendlink['logo']}}" alt="" width="100px">
                    					<input type="file" name="logo">
                    				</div>
                    			</div>
                    			
                    			
                    		</div>
                    		<div class="mws-button-row">
                    			{{csrf_field()}}
                    			<input type="hidden" name="id" value="{{$friendlink['id']}}">
                    			<input type="submit" class="btn btn-danger" value="更新" >
                    			<input type="reset" class="btn" value="重置">
                    		</div>
                    	</form>
                    	
                    </div>    	
                </div>




@endsection('content')