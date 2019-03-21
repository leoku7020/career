<?php ?>
@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Subheader -->
    {{-- {{ Breadcrumbs::render('admin-users-create') }} --}}
    <!-- END: Subheader -->
    <div class="m-content">
        @include('admin.share._flash_message')

        <div class="row">
            <div class="col-md-12">
                <!--begin::Portlet-->
                <div class="m-portlet">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon m--hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="m-portlet__head-text">
                                    @lang('admin.Material Edit')
                                </h3>
                                <div class="m--margin-20">
                                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                        <li class="m-nav__item m-nav__item--home">
                                            <a href="/admin/Index/material" class="m-nav__link m-nav__link--icon">
                                                @lang('admin.Material')
                                            </a>
                                        </li>
                                        <li class="m-nav__separator">/ @lang('admin.Material Edit')</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    @include('admin.index.material._form')
                    <!--end::Form-->
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    {{-- {!! Html::script('js/admin/user/index.js') !!} --}}
@stop
