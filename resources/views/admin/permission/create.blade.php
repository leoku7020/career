<?php ?>
@extends('layouts.admin')

@section('content')
    <!-- BEGIN: Subheader -->
    {{-- {{ Breadcrumbs::render('admin-permissions-create') }} --}}
    <!-- END: Subheader -->
    <div class="m-content">
        <!-- Display Validation Errors -->
        @if (count($errors) > 0)
        <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
            <div class="m-alert__icon">
                <i class="flaticon-exclamation m--font-brand"></i>
            </div>
            <div class="m-alert__text">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

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
                                        Create New Permission
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="m-form" role="form" method="POST" action="{{ url('admin/permissions') }}">
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    {{ csrf_field() }}


                                    <div class="form-group m-form__group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="">Name</label>
                                        <input id="name" type="text" class="form-control m-input mx-w-300" name="name" value="{{ old('name') }}"
                                               required autofocus>
                                        <span class="m-form__help">
                                             Unique name for the permission, used for looking up permission information in the application layer
                                        </span>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                    <div class="form-group m-form__group {{ $errors->has('display_name') ? ' has-error' : '' }}">
                                        <label for="display_name" class="">Display Name:</label>
                                        <input id="name" type="text" class="form-control" name="display_name" value="{{ old('display_name') }}"
                                                   required autofocus>

                                        <span class="m-form__help">
                                            Human readable name for the Permission.
                                        </span>
                                        @if ($errors->has('display_name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('display_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group {{ $errors->has('description') ? ' has-error' : '' }}">
                                        <label for="description" class="col-md-4 control-label">Description</label>
                                        <textarea rows="4" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>

                                        <span class="m-form__help">
                                            A more detailed explanation of the Permission.
                                        </span>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group m-form__group {{ $errors->has('permissions') ? ' has-error' : '' }}">
                                        <label for="permissions" class="col-md-4 control-label">Roles</label>

                                        <div class="col-md-6">
                                            @foreach ($roles as $key => $role)
                                                <input type="checkbox"  value="{{$key}}" name="roles[]"> {{$role}}<br>
                                            @endforeach

                                            @if ($errors->has('roles'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('roles') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- <div class="form-group m-form__group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                        <label for="g-recaptcha-response" class="col-md-4 control-label">CAPTCHA</label>

                                        <span class="m-form__help">
                                            Validate for robot.
                                        </span>
                                        @if ($errors->has('g-recaptcha-response'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                        @endif
										{{ $captcha->display() }}
                                    </div> --}}
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>

                                    <a class="btn btn-link" href="{{ url('admin/permissions') }}">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
