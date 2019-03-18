@php
Former::framework('App\Utils\Former\Framework\Metronic5');
$status_array = ['1'=>'OnLine','2'=>'WaitLine'];
@endphp
<style>
.custom-file-label::after{
	content:"瀏覽";
}
</style>
		<!--begin::Form-->
		@if (session('csrf_error')) {{ session('csrf_error') }} @endif
		@if($banner->status != "4")
		    @php Former::populate($banner); @endphp
		    {!! Former::horizontal_open()
		           ->class('m-form m-form--fit m-form--label-align-right')
		           ->method('PUT')
		           ->route('index.banner.update', [$banner->id] + request()->query())
		           ->enctype("multipart/form-data")
                   ->id('bannerForm')
		    !!}
		    {{ method_field('PATCH') }}
		@else
		    {!! Former::horizontal_open()
		           ->class('m-form m-form--fit m-form--label-align-right')
		           ->method('POST')
                   ->route('index.banner.store', [$banner->id] + request()->query())
		           ->enctype("multipart/form-data")
                   ->id('bannerForm')
		    !!}
		@endif
		{{ csrf_field() }}
		<div class="m-portlet m-portlet--tab">
			<!--begin::Form-->
				<div class="m-portlet__body">
                    <div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							<span class="m--font-danger">
                                *
                            </span>
							@lang('admin.Banner No')
						</label>
						<label for="example-text-input" class="col-2 col-form-label" style="text-align: left;">
							{{$banner->sort}}
						</label>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							<span class="m--font-danger">
                                *
                            </span>
							@lang('admin.Banner Name')
						</label>
						<div class="col-4">
                            @if($banner->status != "4" && old('name') =='')
                                <input class="form-control m-input name" type="text" value="{{$banner->name}}" placeholder="@lang('admin.Name Notice')" name="name" >
                            @else
                                <input class="form-control m-input name" type="text" value="{{old('name')}}" placeholder="@lang('admin.Name Notice')" name="name" >
                            @endif
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							<span class="m--font-danger">
                                *
                            </span>
							@lang('admin.Banner Image')
						</label>
						<div class="col-4">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="cover" name="file">
                                @if($banner->status != "4")
								    <label class="custom-file-label cover" for="customFile" >{{$banner->cover}}</label>
                                @else
                                    <label class="custom-file-label cover" for="customFile" >@lang('admin.File Notice')</label>
                                @endif
							</div>
							<div class="m--margin-top-10">
								<i class="flaticon-exclamation-1"></i>
	                            <span>
	                                @lang('admin.Banner Image PS')
	                            </span>
                        	</div>
						</div>
					</div>
					<div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Status')
                        </label>
                        <div class="col-4">
                            <select class="form-control m-bootstrap-select m_selectpicker ad_status status" tabindex="-98" name="status" id="status">
                                <option value="">@lang('admin.Select')</option>
                                @foreach ($status_array as $key =>  $value)
                                    @if($banner->status != "4" && old('status') == '')
                                        <option value="{{$key}}" {{($key == $banner->status)?('selected'):('')}}>@lang('admin.'.$value)</option>
                                    @else
                                        <option value="{{$key}}" {{($key == old('status'))?('selected'):('')}}>@lang('admin.'.$value)</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Stime')
                        </label>
                        <div class="col-4">
                            @if($banner->status != "4" && old('start_time') == '')
                                <input type="text" class="form-control stime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Stime Notice')" value="{{($banner->status == 2)?(date('Y/m/d H:i',$banner->start_time)):('系統自動帶入現在時間')}}" name="start_time" {{($banner->status != 2)?('disabled="disabled"'):('')}}>
                            @else
                                <input type="text" class="form-control stime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Stime Notice')" value="{{(old('status') == 2)?(old('start_time')):('系統自動帶入現在時間')}}" name="start_time" {{(old('status')!= 2)?('disabled="disabled"'):('')}}>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Edtime')
                        </label>
                        <div class="col-4">
                            @if($banner->status != "4" && old('end_time') == '')
                                <input type="text" class="form-control edtime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Edtime Notice')" value="{{($banner->end_time != "0")?(date('Y/m/d H:i',$banner->end_time)):('')}}" name="end_time" >
                            @else
                                <input type="text" class="form-control edtime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Edtime Notice')" value="{{(old('status') == 2)?(old('end_time')):('系統自動帶入現在時間')}}" name="end_time" {{(old('status')!= 2)?('disabled="disabled"'):('')}}>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        @if($banner->status == "4")
                            <input type="hidden" value="{{$banner->id}}" name="id">
                        @endif
                    </div>
				<div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions">
						<button type="button" class="btn btn-primary banner_submit">@lang('admin.Submit')</button>
						<a class="btn btn-link btn-secondary" href="{{ url('/admin/News/News') }}">
				                @lang('admin.Cancel')
				        </a>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
@section('page-scripts')
    {!! Html::script('js/admin/banner.js') !!}
@stop