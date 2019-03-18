<?php 

?>
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
                            @lang('admin.Users List')
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
                                {{-- <div class="col-md-4">
                                    <div class="m-form__group m-form__group--inline">
                                        <div class="m-form__label">
                                            <label>
                                                @lang('admin.Status'):
                                            </label>
                                        </div>
                                        <div class="m-form__control">
                                            <select class="form-control m-bootstrap-select" id="m_form_status">
                                                <option value="">
                                                    All
                                                </option>
                                                <option value="1">
                                                    Actived
                                                </option>
                                                <option value="2">
                                                    Suspended
                                                </option>
                                                <option value="3">
                                                    Deleted
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-md-none m--margin-bottom-10"></div>
                                </div> --}}

                                <div class="col-md-4">
                                    <div class="m-input-icon m-input-icon--left">
                                        <input type="text" class="form-control m-input" placeholder="@lang('admin.Search')" id="generalSearch">
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
                            <a href="{{ route('system.users.create') }}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>
                                        @lang('admin.Create New User')
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
                        <th>@lang('admin.User Name')</th>
                        <th>@lang('admin.User Email')</th>
                        <th>@lang('admin.User Role')</th>
                        <th>@lang('admin.Status')</th>
                        <th width="220">@lang('admin.Actions')</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($users as $key => $user)

                        <tr class="list-users">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(!empty($user->roles))
                                    @foreach($user->roles as $role)
                                        <label class="label label-success">{{ $role->display_name }}</label>
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                @if($user->status == "1")
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
                                {{-- <a class="btn btn-info" href="{{ route('system.users.show',$user->id) }}">@lang('admin.Show')</a> --}}
                                <a class="btn btn-primary" href="{{ route('system.users.edit',$user->id) }}">@lang('admin.Edit')</a>

                                <form action="{{ route('system.users.destroy',$user->id) }}" method="POST" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $user->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash m-r-5"></i>@lang('admin.Delete')
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

@section('page-scripts')
    {!! Html::script('js/admin/role/index.js') !!}
@stop
