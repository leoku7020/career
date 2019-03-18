@php
Former::framework('App\Utils\Former\Framework\Metronic5');
$status_array = ['1'=>'User Active','0' => 'User Dis Active'];
@endphp

@if (session('csrf_error')) {{ session('csrf_error') }} @endif

@if(isset($user->id))
    @php Former::populate($user); @endphp

    {!! Former::horizontal_open()
           ->class('m-form')
           ->method('PUT')
           ->route('system.users.update', [$user->id] + request()->query())
    !!}
    {{ method_field('PATCH') }}
@else
    {!! Former::horizontal_open()
           ->class('m-form')
           ->method('POST')
           ->route('system.users.store')
    !!}
@endif

    <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
            {{ csrf_field() }}
            <div class="form-group m-form__group row">
                <label for="example-text-input" class="col-2 col-form-label">
                    <span class="m--font-danger">
                        *
                    </span>
                    @lang('admin.News Status')
                </label>
                <div class="col-4">
                    <select class="form-control m-bootstrap-select m_selectpicker" name="status" id="status">
                        <option value="">@lang('admin.News Select')</option>
                        @foreach ($status_array as $key => $value)
                            @if(isset($user))
                                <option value="{{$key}}" {{($user->status == $key)?('selected'):('')}}>@lang('admin.'.$value.'')</option>
                            @else
                                <option value="{{$key}}">@lang('admin.'.$value.'')</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group m-form__group row m--margin-top-10">
                <label for="example-text-input" class="col-2 col-form-label">
                    <span class="m--font-danger">
                        *
                    </span>
                    @lang('admin.User Name')
                </label>
                <div class="col-4">
                    <input class="form-control m-input" type="text" value="{{isset($user)?($user->name):('')}}" placeholder="@lang('admin.Please enter user display name')" id="title" name="user_name">
                </div>
            </div>
            <div class="form-group m-form__group row m--margin-top-10">
                <label for="example-text-input" class="col-2 col-form-label">
                    <span class="m--font-danger">
                        *
                    </span>
                    @lang('admin.User Email')
                </label>
                <div class="col-4">
                    <input class="form-control m-input" type="text" value="{{isset($user)?($user->email):('')}}" placeholder="@lang('admin.Email used to login')" id="title" name="email">
                </div>
            </div>
            @if(!isset($user))
                <div class="form-group m-form__group row m--margin-top-10">
                    <label for="example-text-input" class="col-2 col-form-label">
                        <span class="m--font-danger">
                            *
                        </span>
                        @lang('admin.User Password')
                    </label>
                    <div class="col-4">
                        <input class="form-control m-input" type="password" value="" placeholder="" id="title" name="password">
                    </div>
                </div>
                <div class="form-group m-form__group row m--margin-top-10">
                    <label for="example-text-input" class="col-2 col-form-label">
                        <span class="m--font-danger">
                            *
                        </span>
                        @lang('admin.User Password Confirmation')
                    </label>
                    <div class="col-4">
                        <input class="form-control m-input" type="password" value="" placeholder="" id="title" name="password_confirmation">
                    </div>
                </div>
            @endif
            <div class="form-group m-form__group row m--margin-top-10">
                <label for="example-text-input" class="col-2 col-form-label">
                    <span class="m--font-danger">
                        *
                    </span>
                    @lang('admin.Select A Role...')
                </label>
                <div class="col-4">
                    <select class="form-control m-bootstrap-select m_selectpicker" name="roles">
                        <option value="">@lang('admin.News Select')</option>
                        @foreach ($roles as $key => $val)
                            @if(isset($user))
                                <option value="{{$key}}" {{($key == $userRoles)?('selected'):('')}}>{{$val}}</option>
                            @else
                                <option value="{{$key}}">{{$val}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <button type="submit" class="btn btn-primary">
                @lang('admin.Save')
            </button>

            <a class="btn btn-link btn-secondary" href="{{ url('admin/System/users') }}">
                @lang('admin.Cancel')
            </a>
        </div>
    </div>
{!! Former::close() !!}
