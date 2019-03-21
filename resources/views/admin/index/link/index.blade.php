@php
    $type_array = ['1' => 'NTUST','2' => '人力銀行','3' => '就業資訊','4' => '國家考試','5' => '留學資訊'];   
@endphp

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
                            @lang('admin.Index Links')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                   
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m--align-right">
                    <a href="{{route('index.material.index')}}" class="btn btn-primary">
                        @lang('admin.Material Manager')
                    </a>
                    <a href="{{route('index.material.create')}}" class="btn btn-success">
                        @lang('admin.Material Create')
                    </a>
                </div>
                <div class="m-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            @lang('admin.Index Links')
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
                                                        @lang('admin.Type')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Name')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Stime')
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
                                        @foreach ($links as $link)
                                            <tr>
                                                <td>
                                                    {{$link->sort}}
                                                </td>
                                                @if($link->status != "0")
                                                    <td>
                                                        {{$type_array[$link->material->type]}}
                                                    </td>
                                                    <td>
                                                        {{$link->material->name}}
                                                    </td>
                                                    <td>
                                                        @if($link->created_at)
                                                            {{date('Y-m-d H:i',strtotime($link->created_at))}}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('index.linkUp') }}" method="POST" style="display: inline-block" id="up_{{$link->id}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{$link->id}}" name="code">
                                                            <button type="button" id="delete-task-{{ $link->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only" onclick="up({{$link->id}});" {{($link->sort == "1")?('disabled="disabled"'):('')}}>
                                                                <i class="fa fa-arrow-up"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('index.linkDown') }}" method="POST" style="display: inline-block" id="down_{{$link->id}}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" value="{{$link->id}}" name="code">
                                                            <button type="button" id="delete-task-{{ $link->id }}" class="btn btn-accent m-btn m-btn--icon m-btn--icon-only" onclick="down({{$link->id}});" {{($link->sort == "8")?('disabled="disabled"'):('')}}>
                                                                <i class="fa fa-arrow-down"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('index.link.destroy',$link->id) }}" method="POST" style="display: inline-block" id="delete_{{$link->id}}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="button" id="delete-task-{{ $link->id }}" class="btn btn-warning m-btn m-btn--icon m-btn--icon-only" onclick="check_offline({{$link->id}});">
                                                                <i class="la la-calendar-times-o"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-success m-btn m-btn--icon m-btn--icon-only" onclick="getLinks({{$link->id}})">
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
                                                        
                                                    </td>
                                                    <td>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-success m-btn m-btn--icon m-btn--icon-only" onclick="getLinks({{$link->id}})">
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
                        <div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: none;" aria-hidden="true">
                            <!--begin::Form-->
                            @include('admin.index.link._form')
                            <!--end::Form-->
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    {!! Html::script('js/admin/role/index.js') !!}
@stop
