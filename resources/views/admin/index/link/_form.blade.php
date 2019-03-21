@php
Former::framework('App\Utils\Former\Framework\Metronic5');
@endphp
		<!--begin::Form-->
		@if (session('csrf_error')) {{ session('csrf_error') }} @endif

		    {!! Former::horizontal_open()
		           ->class('m-form m-form--fit m-form--label-align-right')
		           ->method('PUT')
		           ->id('form1')
		    !!}
		    {{ method_field('PATCH') }}
		{{ csrf_field() }}
		<div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('admin.Link Edit')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-3 col-form-label">
                            @lang('admin.No')
                        </label>
                        <label for="example-text-input" class="col-2 col-form-label no">
                            5
                        </label>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-3 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Choose Material')
                        </label>
                        <div class="col-9">
                            <select class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" tabindex="-98" name="material_id" id="material_id">
                                <option value="select">@lang('admin.Select')</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('admin.Cancel')
                    </button>
                    <button type="button" class="btn btn-primary Linksubmit">
                        @lang('admin.Submit')
                    </button>
                </div>
            </div>
        </div>
		</form>