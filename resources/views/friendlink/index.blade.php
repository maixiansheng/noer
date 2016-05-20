@extends('layout.index')
@section('content')
	<div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-IE"></i>友链列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
      
      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 156px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 212px;" aria-label="Browser: activate to sort column ascending">友链名称</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 197px;" aria-label="Platform(s): activate to sort column ascending">URL地址</th>
             <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 197px;" aria-label="Platform(s): activate to sort column ascending">友链描述</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">状态</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">LOGO</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($friendlink as $k=>$v)
          <tr  class="@if($k%2==0)
				even
				@else
				odd
				@endif
          ">
            <td class="  sorting_1">{{$v['id']}}</td>
            <td class=" ">{{$v['name']}}</td>
            <td class=" ">{{$v['url']}}</td>
             <td class=" ">{{$v['descr']}}</td>
            <td class=" ">{{showState($v['status'])}}</td>
            <td class=""><img src="{{$v['logo']}}" alt=""></td>
           <td class=" "><a href="/admin/friendlink/edit/{{$v['id']}}" ><i class="icon-pencil" style="color:black"></i></a>| <a href="/admin/friendlink/delete/{{$v['id']}}"><i class="icon-remove"style="color:red"></i></a></td>
           @endforeach
          
        </tbody>
      </table>

      <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      
       
    </div>
  </div>
</div>

@endsection