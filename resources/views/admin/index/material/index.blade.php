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
                            @lang('admin.Material')
                        </h3>
                        <div class="m--margin-20">
                            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                <li class="m-nav__item m-nav__item--home">
                                    <a href="/admin/Index/link" class="m-nav__link m-nav__link--icon">
                                        @lang('admin.Index Links')
                                    </a>
                                </li>
                                <li class="m-nav__separator">/ @lang('admin.Material')</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                   
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin::Form-->
                @include('admin.index.material._search_form')
                <!--end::Form-->
                <div class="m-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            @lang('admin.Material')
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a href="{{route('index.material.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>@lang('admin.Create')</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="m-portlet__nav-item">
                                            <form action="{{route('index.materialBatchDelete')}}" method="POST" id="batchDelete">
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
                                                        @lang('admin.Type')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Name')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Create Time')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Link')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Edit')
                                                    </th>
                                                </tr>
                                            </thead>
                                    <tbody class="tbody" >    
                                        @foreach ($materials as $key => $material)
                                            <tr>
                                                <td>
                                                    <label class="m-checkbox m-checkbox--single m-checkbox--solid m-checkbox--brand">
                                                        <input type="checkbox" value="" class="m-group-checkable">
                                                        <span></span>
                                                    </label>
                                                    <input type="hidden" value="{{$material->id}}" class="code">
                                                </td>
                                                <td>
                                                    {{$key+1}}
                                                </td>
                                                <td>
                                                    {{$type_array[$material->type]}}
                                                </td>
                                                <td>
                                                    {{$material->name}}
                                                </td>
                                                <td>
                                                    {{date('Y-m-d H:i',strtotime($material->created_at))}}
                                                </td>
                                                <td>
                                                    @if($material->link)
                                                        <a href="{{$material->link}}">連結</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('index.material.destroy',$material->id) }}" method="POST" style="display: inline-block" id="delete_{{$material->id}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="button" id="delete-task-{{ $material->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" onclick="material_delete({{$material->id}});">
                                                            <i class="fa fa-btn fa-trash m-r-5"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('index.material.edit',$material->id) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
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
                                    {{$materials->render()}}
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
