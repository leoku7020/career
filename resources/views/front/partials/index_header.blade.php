<div class="index_top_area">
    <div class="header index">
        <div class="outer-width">
            <nav class="navbar navbar-expand-md navbar-light navbar-default" role="navigation">
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/" class="navbar-brand">
                                <div class="pull-left logo_block mobile_hide"><img src="{{ Url::to('/images/logo.png') }}"></div>
                                <div class="pull-left logo_block web_hide"></div>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-center">
                        <li class="nav-item">
                            <a href="">職缺搜尋</a>
                        </li>
                        <li class="nav-item">
                            <a href="">job Opening</a>
                        </li>
                        <li class="nav-item">
                            <a href="">企業參訪</a>
                        </li>
                        <li class="nav-item">
                            <a href="">業師駐診</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lecture') }}">職涯講座</a>
                        </li>
                        <li class="nav-item">
                            <a href="">校外實習</a>
                        </li>
                        <li class="nav-item">
                            <a href="">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a href="">UCAN</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right login_list">
                        <li class="login_item">
                            <a href="">
                                <div class="icon"><img src="{{ Url::to('/images/icon_student.png') }}"></div>
                                <div class="text">學生專區</div>
                            </a>
                        </li>
                        <li class="login_item">
                            <a href="">
                                <div class="icon"><img src="{{ Url::to('/images/icon_enterprise.png') }}"></div>
                                <div class="text">企業專區</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="mobile_header">
        <div class="inner-width">
            <button class="mobile_menu_btn no-btn-style"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <div class="mobile_logo"><img src="{{ Url::to('/images/mobile_logo.png') }}"></div>
        </div>
        <div class="mobile_menu_area">
            <div id="mobile-menu-modal">
                <div class="button-close"></div>
                <div class="mobile_logo mt-3"><img src="{{ Url::to('/images/mobile_logo.png') }}"></div>
                <div class="mobile_menu_block">
                    <ul class="login_list clearfix">
                        <li class="login_item">
                            <a href="">
                                <div class="icon mb-1"><img src="{{ Url::to('/images/icon_student.png') }}"></div>
                                <div class="text">學生專區</div>
                            </a>
                        </li>
                        <li class="login_item">
                            <a href="">
                                <div class="icon mb-1"><img src="{{ Url::to('/images/icon_enterprise.png') }}"></div>
                                <div class="text">企業專區</div>
                            </a>
                        </li>
                    </ul>
                    <ul class="mobile_menu_list">
                        <li class="mobile_menu_item">
                            <a href="">職缺搜尋</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="">job Opening</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="">企業參訪</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="">業師駐診</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="{{ route('lecture') }}">職涯講座</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="">校外實習</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="">FAQ</a>
                        </li>
                        <li class="mobile_menu_item">
                            <a href="">UCAN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="slider_wrapper">
        <div class="outer-width">
            <div class="slider_area">
                @foreach ($banners as $banner)
                   <div class="image_block" style="background-image:url('{{ url('images/upload/banners/'.$banner->cover) }}')"></div>
                @endforeach
            </div>
        </div>
    </div>
</div>