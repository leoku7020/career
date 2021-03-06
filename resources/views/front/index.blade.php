@php
    $type_array = ['1'=>'pink','2'=>'yellow','3'=>'blue','4'=>'green'];
    $type_text = ['1'=>'實習資訊','2'=>'徵才快報','3'=>'活動公告','4'=>'一般訊息'];
    $cover = ['1'=>'bg_first','2'=>'bg_second','3'=>'bg_third','4'=>'bg_fourth'];
@endphp
@extends('layouts.index')
@section('content')
<div class="index_news_area">
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
            <div class="index_news_area">
                @foreach ($news as $new)
                    <div class="index_news_block clearfix">
                        <div class="left_block">
                            <div class="news_images_block {{$cover[$new->type]}}">
                                <div class="triangle"></div>
                            </div>
                            <div class="news_date_area clearfix">
                                <div class="year">{{date('Y',$new->start_time)}}/</div>
                                <div class="date {{$type_array[$new->type]}}">{{date('m/d',$new->start_time)}}</div>
                            </div>
                        </div>
                        <div class="right_block">
                            <div class="decorative_block">
                                <div class="decorative_line"></div>
                            </div>
                            <div class="news_content_block">
                                <div class="tag {{$type_array[$new->type]}}">{{$type_text[$new->type]}}</div>
                                <a href="{{ route('news.view',['id'=>$new->id]) }}" class="title">{{$new->title}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="more_btn_block">
            <a href="{{ route('news') }}" class="more_btn">更多新聞訊息 <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="page_top_area second">
        <div class="inner-width second">
            <div class="book first mobile_hide"></div>
            <div class="book second"></div>
            <div class="book third"></div>
            <div class="book fourth mobile_hide"></div>
            <div class="title_area">
                <div class="cn">校園徵才活動</div>
                <div class="en">CAMPUS JOB POSTING !</div>
            </div>
        </div>
    </div>
</div>
<div class="campus_job_area">
    <div class="top_triangle"></div>
    <div class="page_content_area">
        <div class="inner-width">
            <div class="campus_job_block clearfix">
                <div class="title">2019校園徵才暨校外實習博覽會</div>
                <div class="date_area clearfix">
                    <div class="date_block">
                        <div class="data_title">活動報名日期：</div>
                        <div class="date">2019/02/08 ～ 2019/02/09</div>
                    </div>
                </div>
                <div class="decorative_line"></div>
                <ul class="info">
                    <li>2018校園徵才說明會  2018/08/01 ~ 2018/12/29</li>
                    <li>2018校園徵才博覽會  2018/12/31</li>
                </ul>
                <div class="apply_btn"><a href="">企業報名</a></div>
            </div>
            <div class="campus_job_block clearfix">
                <div class="title">2019校園徵才暨校外實習博覽會</div>
                <div class="date_area clearfix">
                    <div class="date_block">
                        <div class="data_title">活動報名日期：</div>
                        <div class="date">2019/02/08 ～ 2019/02/09</div>
                    </div>
                </div>
                <div class="decorative_line"></div>
                <ul class="info">
                    <li>2018校園徵才說明會  2018/08/01 ~ 2018/12/29</li>
                    <li>2018校園徵才博覽會  2018/12/31</li>
                </ul>
                <div class="apply_btn"><a href="">企業報名</a></div>
            </div>
            <div class="campus_job_block clearfix">
                <div class="title">2019校園徵才暨校外實習博覽會</div>
                <div class="date_area clearfix">
                    <div class="date_block">
                        <div class="data_title">活動報名日期：</div>
                        <div class="date">2019/02/08 ～ 2019/02/09</div>
                    </div>
                </div>
                <div class="decorative_line"></div>
                <ul class="info">
                    <li>2018校園徵才說明會  2018/08/01 ~ 2018/12/29</li>
                    <li>2018校園徵才博覽會  2018/12/31</li>
                </ul>
                <div class="apply_btn"><a href="">企業報名</a></div>
            </div>
        </div>
        <div class="more_btn_block">
            <a href="" class="more_btn">更多博覽會訊息 <i class="fa fa-sign-out" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="bottom_triangle"></div>
</div>
<div class="promotion_link_area">
    <div class="title">推廣連結</div>
    <div class="line"></div>
    <div class="inner-width">
        <div class="promotion_link_block row">
            @foreach ($links as $link)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3"><a href="" class="promotion_link_item" style="background-image: url('../../images/upload/material/{{$link->material->cover}}')"></a></div>
            @endforeach
        </div>
        <a href="" class="more_btn">more <i class="fa fa-sign-out" aria-hidden="true"></i></a>
    </div>
</div>




@endsection

@section('page-scripts')
{!! Html::script('js/front/header.js') !!}
{!! Html::script('js/front/slider.js') !!}
@endsection