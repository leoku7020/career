@extends('layouts.page')
@section('content')

<div id="page_print" class="page_article_area">
    <div class="page_top_area">
        <div class="inner-width">
            <div class="light first mobile_hide"></div>
            <div class="light second"></div>
            <div class="light third"></div>
            <div class="light fourth mobile_hide"></div>
            <div class="title_area">
                <div class="cn">職涯講座</div>
                <div class="en">LECTURE</div>
            </div>
            <div class="breadcrumb_area">
                <ul class="breadcrumb_list clearfix">
                    <li class="breadcrumb_item"><a href="/">首頁</a></li>
                    <li class="breadcrumb_item"><a href="{{ route('lecture') }}">職涯講座</a></li>
                    <li class="breadcrumb_item">講座詳情</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page_content_area">
        <div class="inner-width">
            <div class="page_article_block">
                <div class="article_title">跟跨領域職能的學長姊們對話-「學長姐們的職場酸甜苦辣」分享講座</div>
                <ul class="article_info_list">
                    <li class="article_info_item"><span>主講人</span>專業講師</li>
                    <li class="article_info_item"><span>活動日期</span>2018-07-02</li>
                    <li class="article_info_item"><span>活動時間</span>08:30～18:00</li>
                    <li class="article_info_item"><span>地點</span>綜合研究大樓RB102</li>
                    <li class="article_info_item mb-5"><span>注意事項</span>當天09:50~10:10於圖書館前集合完畢，請務必服儀整齊、準時報到，逾時不候!</li>
                    <li class="article_info_item"><span>詳細內容</span></li>
                </ul>
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
                <div class="apply_area text-center">
                    {{-- 已經登入 --}}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#lectureApplyModal">
                        報名活動
                    </button>
                    {{-- 未登入 --}}
                    {{-- <button id="js-lecture-apply-btn" type="button" class="btn btn-primary">報名活動</button> --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal --}}
@include($slug.'_modal_lecture_apply')

@endsection

@section('page-scripts')
{!! Html::script('js/front/header.js') !!}
{!! Html::script('js/front/lecture.js') !!}
@endsection