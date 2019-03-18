@if (count($breadcrumbs))
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">

            <h3 class="m-subheader__title m-subheader__title--separator">
                 @lang($breadcrumbs->last()->title)
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                   <a href="{{route('dashboard.index')}}" class="m-nav__link m-nav__link--icon">
                       <i class="m-nav__link-icon la la-home"></i>
                   </a>
                </li>
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!$loop->last)
                    <li class="m-nav__separator">
                       -
                    </li>
                    <li class="m-nav__item">
                       <a href="{{ $breadcrumb->url }}" class="m-nav__link">
                           <span class="m-nav__link-text">
                               @lang($breadcrumb->title)
                           </span>
                       </a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endif
