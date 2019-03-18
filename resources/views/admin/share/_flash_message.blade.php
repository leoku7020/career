@if ($message = Session::get('success'))
<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        {{ $message }}
    </div>
    <div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        <strong>@lang('admin.error')!</strong><br><br>
        <ul>
            <li>{{ $message }}</li>
        </ul>
    </div>
    <div class="m-alert__close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<!-- Display Validation Errors -->
@if (count($errors) > 0)
<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-danger alert-dismissible m--margin-bottom-30" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand"></i>
    </div>
    <div class="m-alert__text">
        <strong>@lang('admin.error')!</strong><br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
</div>
@endif
