@php
    $type_array = ['1'=>'pink','2'=>'yellow','3'=>'blue','4'=>'green'];
    $type_text = ['1'=>'實習資訊','2'=>'徵才快報','3'=>'活動公告','4'=>'一般訊息']; 
@endphp
@extends('layouts.page')
@section('content')

<div id="page_print" class="page_article_area">
    <div class="page_top_area">
        <div class="inner-width">
            <div class="paper_plane first"></div>
            <div class="paper_plane second"></div>
            <div class="paper_plane third"></div>
            <div class="title_area">
                <div class="cn">最新消息</div>
                <div class="en">NEWS!</div>
            </div>
            <div class="breadcrumb_area">
                <ul class="breadcrumb_list clearfix">
                    <li class="breadcrumb_item"><a href="/">首頁</a></li>
                    <li class="breadcrumb_item"><a href="{{ route('news') }}">最新消息</a></li>
                    <li class="breadcrumb_item">{{$type_text[$new->type]}}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page_content_area">
        <div class="inner-width">
            <div class="page_article_block">
                <div class="article_info clearfix">
                    <div class="date"><i class="fa fa-calendar-o mr-2" aria-hidden="true"></i>{{date('Y-m-d',$new->start_time)}}</div>
                    <div class="type"><i class="fa fa-tag mr-2" aria-hidden="true"></i>{{$type_text[$new->type]}}</div>
                </div>
                <div class="article_title">{{$new->title}}</div>
                <div class="article_content">
                    {!!$new->content!!}
                </div>
                <div class="article_footer clearfix">
                    <div class="file_area">
                        @if($new->file)
                            <div class="file_title">附件：</div>
                            <ul class="file_list clearfix">
                                @foreach (json_decode($new->file) as $file)
                                    <li class="file_item"><a href="{{url('/images/upload/news/'.$file)}}" download="{{$file}}">{{$file}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="print_area">
                        <div class="print_block clearfix" name="print" id="print_bt" value="列印">
                            <div class="print_icon"><i class="fa fa-print" aria-hidden="true"></i></div>
                            <div class="print_text">友善列印</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection

@section('page-scripts')
{!! Html::script('js/front/header.js') !!}
{!! Html::script('js/front/print.js') !!}
@endsection