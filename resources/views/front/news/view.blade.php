@extends('layouts.page')
@section('content')

<div id="page_print" class="news_article_area">
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
                    <li class="breadcrumb_item">活動公告</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page_content_area">
        <div class="inner-width">
            <div class="news_article_block">
                <div class="article_info clearfix">
                    <div class="date"><i class="fa fa-calendar-o mr-2" aria-hidden="true"></i>2018-12-12</div>
                    <div class="type"><i class="fa fa-tag mr-2" aria-hidden="true"></i>活動公告</div>
                </div>
                <div class="article_title">轉知「大專校院與國立故宮博物院人才培育合作實習計畫」</div>
                <div class="article_content">
                    <p>【2018聯電尖端智能人才說明會】開放報名！報名出席即享有個人美味獨享餐，更有機會抽中雙人電影票唷!</p>
                    <p>★想搶先一步了解半導體產業趨勢與最新動態嗎?</p>
                    <p>★想認識聯電的設備工程相關職務、未來使命與發展嗎?</p>
                    <p>★尖端智能人才培育計畫，讓你更了解聯華電子的企業文化與發展，並提供最佳的產學接軌機會，保證讓你贏在起跑點!</p>
                    <p>趕緊報名【2018聯電尖端智能人才說明會】→ 報名連結: https://goo.gl/forms/QSu2tgm9ogx4loZj1</p>
                    <p>【2018聯電尖端智能人才說明會】</p>
                    <p>一、時間：107年10月24日(三) 12:20～13:20</p>
                    <p>二、招募對象：大四理工科系在學學生</p>
                    <p>三、地點：綜合研究大樓一樓國際會議廳 RB-102</p>
                    <p>凡出席活動即可享有個人美味獨享餐，更有機會抽中威秀雙人電影票唷!</p>
                    <p>★★歲末最終場，走過路過，千萬別錯過囉★★</p>
                    <p>就業輔導組 熱情邀約</p>
                </div>
                <div class="article_footer clearfix">
                    <div class="file_area">
                        <div class="file_title">附件：</div>
                        <ul class="file_list clearfix">
                            <li class="file_item"><a href="">2018尖端智能菁英.jpg</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英2018尖端智能菁英2018尖端智能菁英.pdf</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.jpg</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英2018尖端智能菁英.pdf</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.jpg</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.pdf</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英2018尖端智能菁英2018尖端智能菁英.jpg</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.pdf</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.jpg</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.pdf</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.jpg</a></li>
                            <li class="file_item"><a href="">2018尖端智能菁英.pdf</a></li>
                        </ul>
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