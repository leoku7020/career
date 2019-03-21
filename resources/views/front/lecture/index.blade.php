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
                <div class="en">LECTURE</div>
            </div>
        </div>
    </div>
    <div class="page_content_area">
        <div class="inner-width">
            <div class="select_area">
                <ul class="select_list clearfix">
                    <li class="select_item active"><span>2019</span></li>
                    <li class="select_item"><span>2018</span></li>
                    <li class="select_item"><span>2017</span></li>
                    <li class="select_item"><span>2016</span></li>
                    <li class="select_item"><span>2015</span></li>
                </ul>
                <select class="form-control select_list_mobile" id="">
                    <option>2019</option>
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                    <option>2015</option>
                </select>
            </div>
            <div class="lecture_content_area">
                <div class="lecture_content_block clearfix">
                    <div class="date_area">
                        <div class="year">2019/</div>
                        <div class="date">02/08</div>
                    </div>
                    <div class="content_area clearfix">
                        <div class="content_title">電影戲劇的巔峰人生x好萊屋20年背後的故事</div>
                        <div class="info">
                            <div class="time clearfix">
                                <div class="title">時間</div>
                                <div class="text">15:30~17:30</div>
                            </div>
                            <div class="location clearfix">
                                <div class="title">地點</div>
                                <div class="text">RB-102</div>
                            </div>
                        </div>
                        <div class="presenter clearfix">
                            <div class="title clearfix">主講人</div>
                            <div class="text clearfix">葉綠茶(設計邊緣人)</div>
                        </div>
                        <div class="detail_block"><a href="{{ route('lecture.view',['id'=>0]) }}" class="detail_bt">活動詳情</a></div>
                    </div>
                </div>
                <div class="lecture_content_block clearfix">
                    <div class="date_area">
                        <div class="year">2019/</div>
                        <div class="date">02/08</div>
                    </div>
                    <div class="content_area clearfix">
                        <div class="content_title">一步走科技/二步行空氣/三能行必有瓦斯能源論壇一步走科技/二步行空氣/三能行必有瓦斯能源論壇</div>
                        <div class="info">
                            <div class="time clearfix">
                                <div class="title">時間</div>
                                <div class="text">15:30~17:30</div>
                            </div>
                            <div class="location clearfix">
                                <div class="title">地點</div>
                                <div class="text">RB-102</div>
                            </div>
                        </div>
                        <div class="presenter clearfix">
                            <div class="title clearfix">主講人</div>
                            <div class="text clearfix">職場專家 Monica邱文仁 小姐 (前104人力銀行 行銷總監)學長姊群講者：半導體龍頭大廠RD、行銷達人傳產產品經理、公部門模範</div>
                        </div>
                        <div class="detail_block"><a href="" class="detail_bt">活動詳情</a></div>
                    </div>
                </div>
                <div class="lecture_content_block clearfix">
                    <div class="date_area">
                        <div class="year">2019/</div>
                        <div class="date">02/08</div>
                    </div>
                    <div class="content_area clearfix">
                        <div class="content_title">電影戲劇的巔峰人生x好萊屋20年背後的故事</div>
                        <div class="info">
                            <div class="time clearfix">
                                <div class="title">時間</div>
                                <div class="text">15:30~17:30</div>
                            </div>
                            <div class="location clearfix">
                                <div class="title">地點</div>
                                <div class="text">RB-102</div>
                            </div>
                        </div>
                        <div class="presenter clearfix">
                            <div class="title clearfix">主講人</div>
                            <div class="text clearfix">李奧那多皮卡丘、安娜蓓爾麗珊著(知名演員)李奧那多皮卡丘、安娜蓓爾麗珊著(知名演員)李奧那多皮卡丘</div>
                        </div>
                        <div class="detail_block"><a href="" class="detail_bt">活動詳情</a></div>
                    </div>
                </div>
            </div>
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

@endsection

@section('page-scripts')
{!! Html::script('js/front/header.js') !!}
@endsection