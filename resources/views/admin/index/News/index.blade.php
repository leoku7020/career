@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Subheader -->
    {{-- {{ Breadcrumbs::render('admin-users') }} --}}
    <!-- END: Subheader -->
    <div class="m-content">
        @include('admin.share._flash_message')
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('admin.Index News')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                   
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin::Form-->
                @include('admin.index.News._search_form')
                <!--end::Form-->
                <div class="m-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            @lang('admin.Index News')
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a href="{{route('index.news.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>@lang('admin.Create')</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-portlet__nav-item">
                                            <form action="{{route('index.newsBatchDelete')}}" method="POST" id="batchDelete">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="" name="code_array" class="code_array">
                                                <button type="button" id="delete-task" class="btn btn-danger
                                                 m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air batchDelete">
                                                    <span>
                                                    <i class="fa fa-trash"></i>
                                                    <span>@lang('admin.Batch Delete')</span>
                                                    </span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <!--begin: Datatable -->
                                <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1065px;">
                                            <thead>
                                                <tr>
                                                    <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 5%;" aria-label="Record ID">
                                                        <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                            <input type="checkbox" value="" class="m-group-checkable checked_all">
                                                            <span></span>
                                                        </label>
                                                    </th>
                                                    <th>
                                                        @lang('admin.No')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Index News Type')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Index News Title')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Index News Stime')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Index News Edtime')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Index News Status')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Edit')
                                                    </th>
                                                </tr>
                                            </thead>
                                    <tbody class="tbody" >    
                                        @foreach ($news as $key => $new)
                                            <tr>
                                                <td>
                                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                        <input type="checkbox" value="" class="m-group-checkable">
                                                        <span></span>
                                                    </label>
                                                    <input type="hidden" value="{{$new->id}}" class="code">
                                                </td>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    @if($new->type == "1")
                                                        <span class="m-badge m-badge--danger m-badge--wide" style="color:white">@lang('admin.Index News Intern')</span>
                                                    @elseif($new->type == "2")
                                                        <span class="m-badge m-badge--warning m-badge--wide" style="color:white">@lang('admin.Index News Want')</span>    
                                                    @elseif($new->type == "3")
                                                        <span class="m-badge m-badge--info m-badge--wide" style="color:white">@lang('admin.Index News Event')</span>
                                                    @elseif($new->type == "4")
                                                        <span class="m-badge m-badge--accent m-badge--wide" style="color:white">@lang('admin.Index News Normal')</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{$new->title}}
                                                </td>
                                                <td>
                                                    {{date('Y-m-d H:i',$new->start_time)}}
                                                </td>
                                                <td>
                                                    @if($new->end_time)
                                                        {{date('Y-m-d H:i',$new->end_time)}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($new->status == "1")
                                                        <span class="m--font-success">
                                                            <b>
                                                                @lang('admin.OnLine')
                                                            </b>
                                                        </span>
                                                    @elseif($new->status == "2")
                                                        <span class="m--font-info">
                                                            <b>
                                                                @lang('admin.WaitLine')
                                                            </b>
                                                        </span>
                                                    @else
                                                        <span class="m--font-danger">
                                                            <b>
                                                                @lang('admin.OffLine')
                                                            </b>
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    
                                                    @if($new->top)
                                                        <a href="{{ route('index.newsDisTop',$new->id) }}" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="la la-star"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('index.newsToTop',$new->id) }}" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="la la-star-o"></i>
                                                        </a>
                                                    @endif
                                                    <form action="{{ route('index.news.destroy',$new->id) }}" method="POST" style="display: inline-block" id="delete_{{$new->id}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="button" id="delete-task-{{ $new->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" onclick="material_delete({{$new->id}});">
                                                            <i class="fa fa-btn fa-trash m-r-5"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('index.news.edit',$new->id) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                                        <i class="flaticon-edit-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-7 dataTables_pager">
                                <div class="dataTables_paginate paging_simple_numbers" id="m_table_1_paginate">
                                    {{$news->render()}}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    {!! Html::script('js/admin/role/index.js') !!}
@stop
