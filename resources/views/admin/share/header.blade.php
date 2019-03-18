<style>
.dataTables_wrapper .pagination .page-item.active>.page-link{
    background:#BD9060;
}
.m-topbar .m-topbar__nav.m-nav > .m-nav__item.m-topbar__user-profile.m-topbar__user-profile--img.m-dropdown--arrow .m-dropdown__arrow{
    color:#BD9060;
}
.dataTables_wrapper .pagination .page-item.active > .page-link{
    background:#BD9060;
}
.dataTables_wrapper .pagination .page-item:hover > .page-link{
    background:#BD9060;
}
</style>
<!-- BEGIN: Header -->
<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
   <div class="m-container m-container--fluid m-container--full-height">
       <div class="m-stack m-stack--ver m-stack--desktop">
           <!-- BEGIN: Brand -->
           <div class="m-stack__item m-brand  m-brand--skin-dark ">
               <div class="m-stack m-stack--ver m-stack--general">
                   <div class="m-stack__item m-stack__item--middle m-brand__logo">
                       <a href="{{route('dashboard.index')}}" class="m-brand__logo-wrapper">
                           {{-- <img src="{{asset('vendor/metronic5.2/images/logo_dashboard.png')}}"> --}}
                           <B>履歷網</B>
                       </a>
                   </div>
                   <div class="m-stack__item m-stack__item--middle m-brand__tools">
                       <!-- BEGIN: Left Aside Minimize Toggle -->
                       <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                           <span></span>
                       </a>
                       <!-- END -->
                       <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                       <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                           <span></span>
                       </a>
                       <!-- END -->
                       <!-- BEGIN: Responsive Header Menu Toggler -->
                       <a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                           <span></span>
                       </a>
                       <!-- END -->
                       <!-- BEGIN: Topbar Toggler -->
                       <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                           <i class="flaticon-more"></i>
                       </a>
                       <!-- BEGIN: Topbar Toggler -->
                   </div>
               </div>
           </div>
           <!-- END: Brand -->
           <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
               <!-- BEGIN: Horizontal Menu -->
               <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn">
                   <i class="la la-close"></i>
               </button>

               <!-- END: Horizontal Menu -->
               <!-- BEGIN: Topbar -->
               <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                   <div class="m-stack__item m-topbar__nav-wrapper">
                       <ul class="m-topbar__nav m-nav m-nav--inline">
                          {{-- user name --}}
                           <li id="" class="m-nav__item">
                            <a href="#" class="m-nav__link m-dropdown__toggle m--margin-top-15">
                                <span class="username" style="color:#BD9060">
                                  {{Auth::user()->name.' ('.Auth::user()->email.')'}}
                                </span>
                              </a>
                           </li>
                           {{-- user info --}}
                           <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
        											<a href="#" class="m-nav__link m-dropdown__toggle">
        												<span class="m-topbar__userpic">
                                    {{ Html::image(asset('vendor/metronic5.2/images/avatar.png'), 'user', array('class' => 'm--img-rounded m--marginless m--img-centered')) }}
        												</span>
        												<span class="m-topbar__username m--hide">
        													{{Auth::user()->name}}
        												</span>
        											</a>
        											<div class="m-dropdown__wrapper">
        												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
        												<div class="m-dropdown__inner">
        													<div class="m-dropdown__header m--align-center" style="background: url({{ asset('images/avatars/avatar-1.png') }}); background-size: cover;">
        														<div class="m-card-user m-card-user--skin-dark">
        															<div class="m-card-user__pic">
        																{{-- <img src="assets/app/media/img/users/user4.jpg" class="m--img-rounded m--marginless" alt=""/> --}}
        															</div>
        															<div class="m-card-user__details">
        																<span class="m-card-user__name m--font-weight-500">
        																	{{Auth::user()->username}}
        																</span>
        																<a href="" class="m-card-user__email m--font-weight-300 m-link">
        																	{{Auth::user()->email}}
        																</a>
        															</div>
        														</div>
        													</div>
        													<div class="m-dropdown__body">
        														<div class="m-dropdown__content">
        															<ul class="m-nav m-nav--skin-light">
        																<li class="m-nav__item">
        																	<a href="{{ route('dashboard.show',Auth::user()->id) }}" class="m-nav__link">
        																		<i class="m-nav__link-icon flaticon-profile-1"></i>
        																		<span class="m-nav__link-title">
        																			<span class="m-nav__link-wrap">
        																				<span class="m-nav__link-text">
        																					@lang('admin.My Profile')
        																				</span>
        																			</span>
        																		</span>
        																	</a>
        																</li>
        																{{-- <li class="m-nav__item">
        																	<a href="header/profile.html" class="m-nav__link">
        																		<i class="m-nav__link-icon flaticon-share"></i>
        																		<span class="m-nav__link-text">
        																			@lang('admin.Activity')
        																		</span>
        																	</a>
        																</li> --}}
        																<li class="m-nav__separator m-nav__separator--fit"></li>
        																<li class="m-nav__item">
        																	<a href="{{route('admin.logout')}}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
        																		@lang('admin.Logout')
        																	</a>
        																</li>
        															</ul>
        														</div>
        													</div>
        												</div>
        											</div>
                          </li>
                           {{-- quick sidebar --}}
                           {{-- <li id="m_quick_sidebar_toggle" class="m-nav__item">
                               <a href="#" class="m-nav__link m-dropdown__toggle">
                                   <span class="m-nav__link-icon">
                                       <i class="flaticon-grid-menu"></i>
                                   </span>
                               </a>
                           </li> --}}
                       </ul>
                   </div>
               </div>
               <!-- END: Topbar -->
           </div>
       </div>
   </div>
</header>
<!-- END: Header -->
