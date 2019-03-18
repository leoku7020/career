<?php ?>

@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Subheader -->
    {{-- {{ Breadcrumbs::render('admin-users-edit', $user) }} --}}
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
                                        @lang('admin.Edit User')
									</h3>
								</div>
							</div>
						</div>
                        <!--begin::Form-->
                        @include('admin.users._form')
                        <!--end::Form-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
