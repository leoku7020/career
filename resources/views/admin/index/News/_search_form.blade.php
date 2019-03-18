@php
    $Categorys = ['1'=>'Intern','2'=>'Want','3'=>'Event','4'=>'Normal'];
    $status = ['1'=>'OnLine','2'=>'WaitLine','0'=>'OffLine'];    
@endphp
@php
Former::framework('App\Utils\Former\Framework\Metronic5');
@endphp
<style>
.custom-file-label::after{
	content:"瀏覽";
}
</style>
		<!--begin::Form-->
		@if (session('csrf_error')) {{ session('csrf_error') }} @endif
	    {!! Former::horizontal_open()
	           ->class('m-form m-form--fit m-form--label-align-right')
	           ->method('POST')
	           ->route('index.news.search')
	           ->id('form')
	    !!}
		{{ csrf_field() }}
		<div class="m-portlet m-portlet--tab">
			<!--begin::Form-->
				<div class="m-portlet__body">
					@if(isset($old))
						<div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Date')
	                        </label>
	                        <div class="col-3">
	                            <input type="text" class="form-control stime" id="S_datetimepicker_1" readonly="" placeholder="@lang('admin.Search Select Strat time')" value="{{(isset($old['start_time']))?($old['start_time']):('')}}" name="start_time" >
	                        </div>
	                        <label class="col-form-label">
	                            to
	                        </label>
							<div class="col-3">
	                            <input type="text" class="form-control edtime" id="S_datetimepicker_2" readonly="" placeholder="@lang('admin.Search Select End time')" value="{{(isset($old['end_time']))?($old['end_time']):('')}}" name="end_time">
	                        </div>
	                    </div>
	                    <div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Type')
	                        </label>
	                        <div class="col-3">
	                            <select class="form-control m-bootstrap-select m_selectpicker type" tabindex="-98" name="type" >
	                                <option value="">@lang('admin.Select')</option>
	                                @foreach ($Categorys as $key => $value)
                                        <option value="{{$key}}" {{($key == $old['type'])?('selected'):('')}}>@lang('admin.Index News '.$value)</option>
	                                @endforeach
	                            </select>
	                        </div>
	                        <label for="example-text-input" class="col-form-label">
	                            @lang('admin.Search Status')
	                        </label>
	                        <div class="col-3">
	                            <select class="form-control m-bootstrap-select m_selectpicker type" tabindex="-98" name="status" >
	                                <option value="">@lang('admin.Select')</option>
	                                @foreach ($status as $key => $value)
                                        <option value="{{$key}}" {{($key == $old['status'])?('selected'):('')}}>@lang('admin.'.$value)</option>
	                                @endforeach
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Keywords')
	                        </label>
	                        <div class="col-3">
	                            <input type="text" class="form-control" placeholder="@lang('admin.Search Keywords Notice')" value="{{(isset($old['keywords']))?($old['keywords']):('')}}" name="keywords" >
	                        </div>
	                    </div>
                    @else
                    	<div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Date')
	                        </label>
	                        <div class="col-3">
	                            <input type="text" class="form-control stime" id="S_datetimepicker_1" readonly="" placeholder="@lang('admin.Search Select Strat time')" value="" name="start_time" >
	                        </div>
	                        <label class="col-form-label">
	                            to
	                        </label>
							<div class="col-3">
	                            <input type="text" class="form-control edtime" id="S_datetimepicker_2" readonly="" placeholder="@lang('admin.Search Select End time')" value="" name="end_time">
	                        </div>
	                    </div>
	                    <div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Type')
	                        </label>
	                        <div class="col-3">
	                            <select class="form-control m-bootstrap-select m_selectpicker type" tabindex="-98" name="type" >
	                                <option value="">@lang('admin.Select')</option>
	                                @foreach ($Categorys as $key => $value)
                                        <option value="{{$key}}">@lang('admin.Index News '.$value)</option>
	                                @endforeach
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Status')
	                        </label>
	                        <div class="col-3">
	                            <select class="form-control m-bootstrap-select m_selectpicker type" tabindex="-98" name="status" >
	                                <option value="">@lang('admin.Select')</option>
	                                @foreach ($status as $key => $value)
                                        <option value="{{$key}}">@lang('admin.'.$value)</option>
	                                @endforeach
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group m-form__group row">
	                        <label for="example-text-input" class="col-2 col-form-label">
	                            @lang('admin.Search Keywords')
	                        </label>
	                        <div class="col-3">
	                            <input type="text" class="form-control" placeholder="@lang('admin.Search Keywords Notice')" value="" name="keywords" >
	                        </div>
	                    </div>
                    @endif
				</div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="submit" class="btn btn-brand m-btn m-btn--icon">
							<span>
								<i class="la la-search"></i>
								<span>Search</span>
							</span>
						</button>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>