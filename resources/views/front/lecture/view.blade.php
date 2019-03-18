@extends('layouts.page')
@section('content')

<div class="lecture_area">
    <div class="page_top_area">
        <div class="inner-width">
            <div class="light first mobile_hide"></div>
            <div class="light second"></div>
            <div class="light third"></div>
            <div class="light fourth mobile_hide"></div>
            <div class="title_area">
                <div class="cn">職涯講座</div>
                <div class="en">Lecture</div>
            </div>
        </div>
    </div>
    <div class="page_content_area">
        <div class="inner-width">

        </div>
    </div>
</div>

@endsection

@section('page-scripts')
{!! Html::script('js/front/header.js') !!}
@endsection