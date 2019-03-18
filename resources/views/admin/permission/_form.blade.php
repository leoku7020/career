<?php Former::framework('App\Utils\Former\Framework\Metronic5'); ?>
{!! Former::horizontal_open()
       ->class('m-form')
       ->method('POST')
       ->route('permissions.store')
!!}
    <div class="m-portlet__body">
        <div class="m-form__section m-form__section--first">
            {{ csrf_field() }}
            {!! Former::text('name')
                    ->class('m-input')
                    ->inlineError('name', $errors)
                    ->inlineHelp('Unique name for the permission, used for looking up permission information in the application layer')
            !!}
            {!! Former::text('display_name')
                    ->inlineHelp('Human readable name for the Permission.')
            !!}
            {!! Former::text('description')
                    ->inlineHelp('A more detailed explanation of the Permission.')
            !!}
        </div>
    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions">
            <button type="submit" class="btn btn-primary">
                @lang('admin.Save')
            </button>

            <a class="btn btn-link btn-secondary" href="{{ route('permissions.index') }}">
                @lang('admin.Cancel')
            </a>
        </div>
    </div>
{!! Former::close() !!}
