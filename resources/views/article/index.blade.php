@extends('layout.index')
@section('content')
  <div class="mws-panel grid_8">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>文章列表</span>
  </div>
  <div class="mws-panel-body no-padding">
    <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">
      <form action="/admin/article/index" method="get" >
      <div id="DataTables_Table_1_length" class="dataTables_length">
           <label>显示
           <select name="num" size="1" aria-controls="DataTables_Table_1">
            <option value="10" @if(!empty($request['num']) && $request == 10)
              selected
              @endif 
              >10</option>
            <option value="25"@if(!empty($request['num']) && $request == 25)
              selected
              @endif>25</option>
            <option value="50"@if(!empty($request['num']) && $request == 50)
              selected
              @endif>50</option>
            <option value="100"@if(!empty($request['num']) && $request == 100)
              selected
              @endif>100</option></select>条</label>
      </div>
      <div class="dataTables_filter" id="DataTables_Table_1_filter">
        <label>关键字:
          <input type="text" @if(!empty($request['keywords']))
          value="{{$request['keywords']}}"
          @endif
           name="keywords" ><button class="btn btn-primary">搜索</button></label>
      </div>
      </form>
      <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 156px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 212px;" aria-label="Browser: activate to sort column ascending">标题</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 197px;" aria-label="Platform(s): activate to sort column ascending">描述</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">内容</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 133px;" aria-label="Engine version: activate to sort column ascending">主图</th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 97px;" aria-label="CSS grade: activate to sort column ascending">操作</th></tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        @foreach($articles as $k=>$v)
          <tr  class="@if($k%2==0)
        even
        @else
        odd
        @endif
          ">
            <td class="  sorting_1">{{$v['id']}}</td>
            <td class=" ">{{$v['title']}}</td>
            <td class=" ">{{$v['descr']}}</td>
            <td class=" ">{{$v['content']}}</td>
            <td class=""><img src="{{$v['pic']}}" alt=""></td>
           <td class=" "><a href="/admin/article/edit/{{$v['id']}}" ><i class="icon-pencil" style="color:black"></i></a>| <a href="/admin/article/delete/{{$v['id']}}"><i class="icon-remove"style="color:red"></i></a></td>
           @endforeach
          
        </tbody>
      </table>

      <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
      <div class="dataTables_paginate paging_full_numbers" id="pages">
      {!!$articles->appends($request)->render()!!}
       
    </div>
  </div>
</div>

@endsection