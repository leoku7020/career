@php
Former::framework('App\Utils\Former\Framework\Metronic5');
$type_array = ['1' => 'NTUST','2' => '人力銀行','3' => '就業資訊','4' => '國家考試','5' => '留學資訊'];   
@endphp
<style>
.custom-file-label::after{
    content:"瀏覽";
}
</style>
        <!--begin::Form-->
        @if (session('csrf_error')) {{ session('csrf_error') }} @endif

        @if(isset($material->id))
            @php Former::populate($material); @endphp

            {!! Former::horizontal_open()
                   ->class('m-form m-form--fit m-form--label-align-right')
                   ->method('PUT')
                   ->route('index.material.update', [$material->id] + request()->query())
                   ->enctype("multipart/form-data")
                   ->id('materialform')
            !!}
            {{ method_field('PATCH') }}
        @else
            {!! Former::horizontal_open()
                   ->class('m-form m-form--fit m-form--label-align-right')
                   ->method('POST')
                   ->route('index.material.store')
                   ->enctype("multipart/form-data")
                   ->id('materialform')
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
                            @lang('admin.Name')
                        </label>
                        <div class="col-4">
                            @if(old('name'))
                                <input class="form-control m-input name" type="text" value="{{old('name')}}" placeholder="@lang('admin.Name Notice')" id="example-text-input" name="name" >
                            @else
                                <input class="form-control m-input name" type="text" value="{{(isset($material))?($material->name):('')}}" placeholder="@lang('admin.Name Notice')" id="example-text-input" name="name" >
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Type')
                        </label>
                        <div class="col-4">
                            <select class="form-control m-bootstrap-select m_selectpicker type" tabindex="-98" name="type" id="type">
                                <option value="">@lang('admin.Select')</option>
                                @foreach ($type_array as $key =>  $value)
                                    @if(isset($material) && old('type') == '')
                                        <option value="{{$key}}" {{($key == $material->type && $material->stauts !="0")?('selected'):('')}}>{{$value}}</option>
                                    @else
                                        <option value="{{$key}}" {{($key == old('type'))?('selected'):('')}}>{{$value}}</option>
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
                            @lang('admin.Image')
                        </label>
                        <div class="col-4">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                @if(isset($material))
                                    <label class="custom-file-label file" for="customFile" >{{$material->cover}}</label>
                                @else
                                    <label class="custom-file-label file" for="customFile" >@lang('admin.File Notice')</label>
                                @endif
                            </div>
                            <div class="m--margin-top-10">
                                <i class="flaticon-exclamation-1"></i>
                                <span>
                                    @lang('admin.Material Image PS')
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        <label for="example-text-input" class="col-2 col-form-label">
                            <span class="m--font-danger">
                                *
                            </span>
                            @lang('admin.Link')
                        </label>
                        <div class="col-4">
                            @if(old('link'))
                                <input class="form-control m-input link" type="text" value="{{old('link')}}" placeholder="@lang('admin.Link Notice')" id="example-text-input" name="link" >
                            @else
                                <input class="form-control m-input link" type="text" value="{{(isset($material))?($material->link):('')}}" placeholder="@lang('admin.Link Notice')" id="example-text-input" name="link" >
                            @endif
                            <div class="m--margin-top-10">
                                <i class="flaticon-exclamation-1"></i>
                                <span>
                                    @lang('admin.Material Link PS')
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="button" class="btn btn-primary material_submit">@lang('admin.Submit')</button>
                        <a class="btn btn-link btn-secondary" href="{{ url('/admin/Carousel/Material') }}">
                                @lang('admin.Cancel')
                        </a>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
@section('page-scripts')
    {!! Html::script('js/admin/material.js') !!}
@stop