<?php ?>
@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Subheader -->
    {{-- {{ Breadcrumbs::render('admin-roles') }} --}}
    <!-- END: Subheader -->
    <div class="m-content">
        @include('admin.share._flash_message')

        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            @lang('admin.Roles List')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin: Search Form -->
                <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                    <div class="row align-items-center">
                        <div class="col-xl-8 order-2 order-xl-1">
                            <div class="form-group m-form__group row align-items-center">
                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" placeholder="Search..." id="generalSearch">
                                        <span class="m-input-icon__icon m-input-icon__icon--left">
                                            <span>
                                                <i class="la la-search"></i>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                            <a href="{{ route('system.roles.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        @lang('admin.New Role')
                                    </span>
                                </span>
                            </a>
                            <div class="m-separator m-separator--dashed d-xl-none"></div>
                        </div>
                    </div>
                </div>
                <!--end: Search Form -->
                <table class="table m-table m-table--head-bg-success">
                    <thead>
                    <tr>
                        <th>@lang('admin.Role Name')</th>
                        <th>@lang('admin.Role Description')</th>
                        <th>@lang('admin.News Status')</th>
                        <th width="250">@lang('admin.Actions')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $key => $role)
                        <tr class="list-users">
                            <td>{{ $role->display_name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                @if($role->status == "1")
                                    <span class="m--font-success">
                                        <b>
                                            @lang('admin.User Active')
                                        </b>
                                    </span>
                                @else
                                    <span class="m--font-danger">
                                        <b>
                                            @lang('admin.User Dis Active')
                                        </b>
                                    </span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('system.roles.edit',$role->id) }}">@lang('admin.Edit')</a>

                                <form action="{{ url('admin/roles/'.$role->id) }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $role->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>@lang('admin.Delete')
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
