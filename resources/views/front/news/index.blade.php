@php
    $type_array = ['1'=>'pink','2'=>'yellow','3'=>'blue','4'=>'green'];
    $type_text = ['1'=>'實習資訊','2'=>'徵才快報','3'=>'活動公告','4'=>'一般訊息']; 
@endphp
@extends('layouts.page')
@section('content')

<div class="news_area">
    <div class="page_top_area">
        <div class="inner-width">
            <div class="paper_plane first"></div>
            <div class="paper_plane second"></div>
            <div class="paper_plane third"></div>
            <div class="title_area">
                <div class="cn">最新消息</div>
                <div class="en">NEWS!</div>
            </div>
        </div>
    </div>
    <div class="page_content_area">
        <div class="inner-width">
            <div class="select_area">
                <ul class="select_list clearfix">
                    <li class="select_item {{$type == '' ? 'active':''}}">
                        <a href="/news">全部</a>
                    </li>
                    @foreach ($type_text as $key => $value)
                        <li class="select_item {{$type == $key ? 'active':''}}" >
                            <a href="{{'?type='.$key}}">{{$value}}</a>
                        </li>
                    @endforeach
                </ul>
                <select class="form-control select_list_mobile" id="">
                    <option>全部</option>
                    <option>實習資訊</option>
                    <option>徵才快報</option>
                    <option>活動公告</option>
                    <option>一般訊息</option>
                </select>
            </div>
            <div class="news_content_area">
                <div class="title">{{$type == '' ? '全部最新消息' : $type_text[$type]}}</div>
                <ul class="news_list">
                    @foreach ($news as $new)
                        <li class="news_item">
                            <a href="{{ route('news.view',['id'=>$new->id]) }}" class="clearfix">
                                <div class="date">{{date('Y/m/d',$new->start_time)}}</div>
                                <div class="tag {{$type_array[$new->type]}}">{{$type_text[$new->type]}}</div>
                                @if($new->top)
                                    <div class="fixtop">[置頂]</div>
                                @endif
                                <div class="content">{{$new->title}}</div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{$news->render()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


@endsection

@section('page-scripts')
{!! Html::script('js/front/header.js') !!}
@endsection