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
                            @lang('admin.Dashboard')
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="m-section">
                    <span class="m-section__sub">
                        @lang('admin.Now Login Account') : {{Auth::user()->email}}
                    </span>
                    <span class="m-section__sub">
                        @lang('admin.Account Name') : {{Auth::user()->name}}
                    </span>
                    <span class="m-section__sub">
                        @lang('admin.Account Role') : {{$role->display_name}}
                    </span>
                </div>
                <div class="m-content">
                        
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    {{-- {!! Html::script('js/admin/role/index.js') !!} --}}
@stop
