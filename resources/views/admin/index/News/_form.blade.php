@php
Former::framework('App\Utils\Former\Framework\Metronic5');
$type_array = ['1'=>'Intern','2'=>'Want','3'=>'Event','4'=>'Normal'];
$status_array = ['1'=>'OnLine','2'=>'WaitLine','0'=>'OffLine'];
@endphp
<style>
.custom-file-label::after{
    content:"瀏覽";
}
</style>
        <!--begin::Form-->
        @if (session('csrf_error')) {{ session('csrf_error') }} @endif

        @if(isset($new->id))
            @php Former::populate($new); @endphp

            {!! Former::horizontal_open()
                   ->class('m-form m-form--fit m-form--label-align-right')
                   ->method('PUT')
                   ->route('index.news.update', [$new->id] + request()->query())
                   ->enctype("multipart/form-data")
            !!}
            {{ method_field('PATCH') }}
        @else
            {!! Former::horizontal_open()
                   ->class('m-form m-form--fit m-form--label-align-right')
                   ->method('POST')
                   ->route('index.news.store')
                   ->enctype("multipart/form-data")
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
                            @lang('admin.Index News Title')
                        </label>
                        <div class="col-4">
                            @if(old('title'))
                                <input class="form-control m-input" type="text" value="{{old('title')}}" placeholder="@lang('admin.Material Name Notice')" id="example-text-input" name="title" >
                            @else
                                <input class="form-control m-input" type="text" value="{{(isset($new))?($new->title):('')}}" placeholder="@lang('admin.Title Notice')" id="example-text-input" name="title" >
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Index News Type')
                        </label>
                        <div class="col-4">
                            <select class="form-control m-bootstrap-select m_selectpicker" tabindex="-98" name="type" id="type">
                                <option value="">@lang('admin.Select')</option>
                                @foreach ($type_array as $key =>  $value)
                                    @if(isset($new) && old('type') == '')
                                        <option value="{{$key}}" {{($key == $new->type)?('selected'):('')}}>@lang('admin.Index News '.$value)</option>
                                    @else
                                        <option value="{{$key}}" {{($key == old('type'))?('selected'):('')}}>@lang('admin.Index News '.$value)</option>
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
                            @lang('admin.Status')
                        </label>
                        <div class="col-4">
                            <select class="form-control m-bootstrap-select m_selectpicker ad_status status" tabindex="-98" name="status" id="status">
                                <option value="">@lang('admin.Select')</option>
                                @foreach ($status_array as $key =>  $value)
                                    @if(isset($new) && old('status') == '')
                                        <option value="{{$key}}" {{($key == $new->status)?('selected'):('')}}>@lang('admin.'.$value)</option>
                                    @else
                                        <option value="{{$key}}" {{($key == old('status') && old('status')!= '')?('selected'):('')}}>@lang('admin.'.$value)</option>
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
                            @if(isset($new) && old('start_time') == '')
                                <input type="text" class="form-control stime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Stime Notice')" value="{{($new->status == 2)?(date('Y/m/d H:i',$new->start_time)):('系統自動帶入現在時間')}}" name="start_time" {{($new->status != 2)?('disabled="disabled"'):('')}}>
                            @else
                                <input type="text" class="form-control stime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Stime Notice')" value="{{(old('status') == 2)?(old('start_time')):('系統自動帶入現在時間')}}" name="start_time" {{(old('status')!= 2)?('disabled="disabled"'):('')}}>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            @lang('admin.Edtime')
                        </label>
                        <div class="col-4">
                            @if(isset($new) && old('end_time') == '')
                                <input type="text" class="form-control edtime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Edtime Notice')" value="{{($new->end_time != "0")?(date('Y/m/d H:i',$new->end_time)):('')}}" name="end_time" >
                            @else
                                <input type="text" class="form-control edtime" id="m_datetimepicker_2" readonly="" placeholder="@lang('admin.Edtime Notice')" value="{{old('end_time')}}" name="end_time">
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Index News Content')
                        </label>
                        <div class="col-10">
                            @if(isset($new))
                                <textarea name="summernoteInput" class="summernote" style="height:500px">{!!$new->content!!}</textarea>
                            @else
                                <textarea name="summernoteInput" class="summernote" style="height:500px">{!!old('summernoteInput')!!}</textarea>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.File')
                        </label>
                        <div class="col-4">
                            <div class="custom-file">
                                <input multiple type="file" class="custom-file-input multiple" id="cover" name="file[]">
                                <label class="custom-file-label cover" for="customFile" >@lang('admin.File Notice')</label>
                            </div>
                            <div class="m--margin-top-10">
                                <i class="flaticon-exclamation-1"></i>
                                <span>
                                    @lang('admin.File PS')
                                </span>
                            </div>
                        </div>
                    </div>
                    @if(isset($new))
                        @if($new->file)
                            @foreach (json_decode($new->file) as $key => $file)
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">
                                   
                                </label>
                                <div class="col-3">
                                    <label for="example-text-input" class="col-2 col-form-label">
                                        {{$file}}
                                    </label>
                                </div>
                                <div class="col-1">
                                    <button type="button" id="delete-task-{{ $new->id }}" class="btn btn-danger m-btn m-btn--icon m-btn--icon-only" onclick="file_delete({{$new->id}},'{{$file}}',this);">
                                        <i class="fa fa-btn fa-trash m-r-5"></i>
                                    </button>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-primary">@lang('admin.Submit')</button>
                        <a class="btn btn-link btn-secondary" href="{{ url('/admin/Carousel/Material') }}">
                                @lang('admin.Cancel')
                        </a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
@section('page-scripts')
    {!! Html::script('js/admin/editor.js') !!}
@stop