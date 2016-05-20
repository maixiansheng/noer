@extends('layout.index');
@section('content');

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-pencil"></i> 用户添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    {{session('error')}}
                    	<form action="/admin/user/insert" method="post" class="mws-form">
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
                                	<label class="mws-form-label">用户名</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="username" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">密码</label>
                                	<div class="mws-form-item">
                                    	<input type="password" name="password" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">确认密码</label>
                                	<div class="mws-form-item">
                                    	<input type="password" name="repassword" class="large">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">邮箱</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="email"class="large">
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