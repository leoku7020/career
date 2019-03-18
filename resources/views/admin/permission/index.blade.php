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
                            @lang('admin.Permissions')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                   
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-section">
                    <div class="col-md-4">
                        <div class="m-input-icon m-input-icon--left">
                            <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                <span><i class="la la-search"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="m-content">
                        <div class="m-portlet m-portlet--mobile">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            @lang('admin.Permissions')
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item">
                                            <a href="{{route('carousel.Material.create')}}" class="btn btn-accent m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
                                                <span>
                                                    <i class="la la-plus"></i>
                                                    <span>@lang('admin.Create New Permission')</span>
                                                </span>
                                            </a>
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
                                                    <th>
                                                        @lang('admin.Permission Name')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Permission Description')
                                                    </th>
                                                    <th>
                                                        @lang('admin.Material Edit')
                                                    </th>
                                                </tr>
                                            </thead>
                                    <tbody class="tbody" >    
                                        @foreach ($permissions as $permission)
                                            <tr>
                                                <td>
                                                    {{$permission->display_name}}
                                                </td>
                                                <td>
                                                    {{$permission->description}}
                                                </td>
                                                <td>
                                                    <form action="{{ route('carousel.Material.destroy',$permission->id) }}" method="POST" style="display: inline-block" id="delete_{{$permission->id}}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="button" id="delete-task-{{ $permission->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" onclick="material_delete({{$permission->id}});">
                                                            <i class="fa fa-btn fa-trash m-r-5"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('carousel.Material.edit',$permission->id) }}" class="btn btn-success m-btn m-btn--icon m-btn--icon-only">
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
                                    {{$permissions->render()}}
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
