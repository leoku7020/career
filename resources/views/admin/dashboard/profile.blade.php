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
                                    @lang('admin.My Account')
                                </h3>
                            </div>
                        </div>
                    </div>
                <div class="m-portlet__body">
                    <div class="m-section">
                        <span class="m-section__sub">
                            @lang('admin.Now Login Account') : {{$user->email}}
                        </span>
                        <span class="m-section__sub">
                            @lang('admin.Account Name') : {{$user->name}}
                        </span>
                        <span class="m-section__sub">
                            @lang('admin.Account Role') : {{$user->roles[0]['display_name']}}
                        </span>
                    </div>
                </div>
                    <!--begin::Form-->
                    @include('admin.dashboard._form_profile')
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
