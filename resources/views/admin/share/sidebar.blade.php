@php
	$user = Auth::user();
@endphp

<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            {{-- dashboard --}}
            <li class="m-menu__item " aria-haspopup="true">
                <a href="{{route('dashboard.index')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								@lang('admin.Dashboard')
							</span>
							{{-- <span class="m-menu__link-badge">
								<span class="m-badge m-badge--danger">
									2
								</span>
							</span> --}}
						</span>
					</span>
				</a>
            </li>
            {{-- Index --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-home"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Index')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                    	{{-- Banners --}}
                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('index.banner.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Index Banners')
								</span>
							</a>
						</li>
						{{-- News --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('index.news.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Index News')
								</span>
							</a>
						</li>
						{{-- Links --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('index.link.index')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Index Links')
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
            {{-- Member --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-user"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Member')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                    	{{-- Company --}}
                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Member Company')
								</span>
							</a>
						</li>
						{{-- Student --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Member Student')
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
            {{-- Jobs --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-search"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Jobs')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                    	{{-- List --}}
                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Jobs List')
								</span>
							</a>
						</li>
						{{-- Opening --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Jobs Opening')
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
            {{-- Events --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon fa fa-calendar"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Events')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Events Page')
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
            {{-- Teacher --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-info"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Teacher')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                    	{{-- List--}}
                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Teacher List')
								</span>
							</a>
						</li>
						{{-- Schedule --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Teacher Schedule')
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
            {{-- Other --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-layers"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Other')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                    	{{-- Visit --}}
                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Other Visit')
								</span>
							</a>
						</li>
						{{-- Lecture --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Other Lecture')
								</span>
							</a>
						</li>
						{{-- Intern --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Other Intern')
								</span>
							</a>
						</li>
						{{-- FAQ --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Other FAQ')
								</span>
							</a>
						</li>
						{{-- UCAN --}}
						<li class="m-menu__item " aria-haspopup="true" >
							<a  href="" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    @lang('admin.Other UCAN')
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
            {{-- 要加上權限驗證 -> larvata --}}
            {{-- admin tools --}}
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--expanded" aria-haspopup="true" m-menu-submenu-toggle="hover">
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-cogwheel"></i>
					<span class="m-menu__link-text">
                        @lang('admin.Admin Tools')
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('utility.logs')}}" class="m-menu__link " target="_BLANK">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    Logs
								</span>
							</a>
						</li>

                        <li class="m-menu__item " aria-haspopup="true" >
							<a  href="{{route('utility.api-tester')}}" class="m-menu__link " target="_BLANK">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
                                    Api-Tester
								</span>
							</a>
						</li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
