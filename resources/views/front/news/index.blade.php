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
                    <li class="select_item active">全部</li>
                    <li class="select_item">實習資訊</li>
                    <li class="select_item">徵才快報</li>
                    <li class="select_item">活動公告</li>
                    <li class="select_item">一般訊息</li>
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
                <div class="title">全部最新消息</div>
                <ul class="news_list">
                    <li class="news_item">
                        <a href="{{ route('news.view',['id'=>0]) }}" class="clearfix">
                            <div class="date">2018/07/14</div>
                            <div class="tag pink">實習資訊</div>
                            <div class="fixtop">[置頂]</div>
                            <div class="content">轉知「大專校院與國立故宮博物院人才培育合作實習計畫」，轉知「大專校院與國立故宮博物院人才培育合作實習計畫」，轉知「大專校院與國立故宮博物院人才培育合作實習計畫」</div>
                        </a>
                    </li>
                    <li class="news_item">
                        <a href="" class="clearfix">
                            <div class="date">2018/07/14</div>
                            <div class="tag yellow">徵才快報</div>
                            <div class="fixtop">[置頂]</div>
                            <div class="content">轉知「大專校院與國立故宮博物院人才培育合作實習計畫」</div>
                        </a>
                    </li>
                    <li class="news_item">
                        <a href="" class="clearfix">
                            <div class="date">2018/07/14</div>
                            <div class="tag blue">活動公告</div>
                            <div class="content">轉知「大專校院與國立故宮博物院人才培育合作實習計畫」，轉知「大專校院與國立故宮博物院人才培育合作實習計畫」，轉知「大專校院與國立故宮博物院人才培育合作實習計畫」</div>
                        </a>
                    </li>
                    <li class="news_item">
                        <a href="" class="clearfix">
                            <div class="date">2018/07/14</div>
                            <div class="tag green">一般訊息</div>
                            <div class="content">轉知「大專校院與國立故宮博物院人才培育合作實習計畫」</div>
                        </a>
                    </li>
                </ul>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
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