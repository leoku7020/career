<?php ?>
@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Subheader -->
    {{-- {{ Breadcrumbs::render('admin-users-show', $user) }} --}}
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
									@lang('admin.Show User')
								</h3>
							</div>
						</div>
					</div>
                    <div class="m-form">
                    <!--begin::Form-->
                        <div class="m-portlet__body">
                            <div class="m-form__section m-form__section--first">
                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    {{ $user->username }}
                                </div>


                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">E-mail</label>
                                    {{ $user->email }}
                                </div>


                                <div class="form-group">
                                    <label for="name" class="col-md-4 control-label">Roles</label>
                                    @if(!empty($user->roles))
                                        @foreach($user->roles as $role)
                                            <label class="label label-success">{{ $role->display_name }}</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <a class="btn btn-link  btn-primary" href="{{ route('system.users.edit',$user->id) }}">
                                    @lang('admin.Edit')
                                </a>
                                <a class="btn btn-link  btn-secondary" href="{{ url('admin/users') }}">
                                    @lang('admin.Return')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
