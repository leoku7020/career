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
                            @lang('admin.Index Banners')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                   
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m--align-left">
                    {{-- <a href="#" class="btn btn-primary m-btn--wide">
                        <span>
                            <span>@lang('admin.News Record')</span>
                        </span>
                    </a>

                    <a href="#" class="btn btn-primary m-btn--wide">
                        <span>
                            <span>@lang('admin.News Category')</span>
                        </span>
                    </a> --}}
                </div>
                <div class="m-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            @lang('admin.Index Banners')
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                {{-- <i class="flaticon-exclamation-1"></i>
                                <span>
                                    @lang('admin.News Notice')
                                </span> --}}
                                <!--begin: Datatable -->
                                <div id="m_table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline" id="m_table_1" role="grid" aria-describedby="m_table_1_info" style="width: 1065px;">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        @lang('admin.Banner No')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Status')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Banner Name')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Stime')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Edtime')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Sort')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Go Off')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Edit')
                                                    </th>
                                                </tr>
                                            </thead>
                                    <tbody class="tbody" >    
                                        @foreach ($banners as $banner)
                                            <tr>
                                                <td>
                                                    {{$banner->sort}}
                                                </td>
                                                @if($banner->status != "4")
                                                    <td>
                                                        @if($banner->status == "1")
                                                            <span class="m--font-success">
                                                                <b>
                                                                    @lang('admin.OnLine')
                                                                </b>
                                                            </span>
                                                        @elseif($banner->status == "2")
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
                                                        {{$banner->name}}
                                                    </td>
                                                    <td>
                                                        @if($banner->start_time)
                                                            {{date('Y-m-d H:i',$banner->start_time)}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($banner->end_time)
                                                            {{date('Y-m-d H:i',$banner->end_time)}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('index.bannerUp') }}" method="POST" style="display: inline-block" id="up_{{$banner->id}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{$banner->id}}" name="code">
                                                            <button type="button" id="delete-task-{{ $banner->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only" onclick="up({{$banner->id}});" {{($banner->sort == "1")?('disabled="disabled"'):('')}}>
                                                                <i class="fa fa-arrow-up"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('index.bannerDown') }}" method="POST" style="display: inline-block" id="down_{{$banner->id}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{$banner->id}}" name="code">
                                                            <button type="button" id="delete-task-{{ $banner->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only" onclick="down({{$banner->id}});" {{($banner->sort == "4")?('disabled="disabled"'):('')}}>
                                                                <i class="fa fa-arrow-down"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('index.banner.destroy',$banner->id) }}" method="POST" style="display: inline-block" id="delete_{{$banner->id}}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="button" id="delete-task-{{ $banner->id }}" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only" onclick="check_offline({{$banner->id}});">
                                                                <i class="la la-calendar-times-o"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('index.banner.edit',$banner->id) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="flaticon-edit-1"></i>
                                                        </a>
                                                    </td>
                                                @else
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('index.banner.edit',$banner->id) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
                                                            <i class="flaticon-edit-1"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
