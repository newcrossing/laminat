<ul class="menu-content">
    @if (isset($menu))
        @foreach ($menu as $submenu)
            <li {{(request()->is($submenu->url)) ? 'class=active' : '' }}>
                <a href="@isset($submenu->url) {{asset($submenu->url)}} @endisset" @if(isset($submenu->newTab)){{"target=_blank"}}@endif>

                    @if(isset($submenu->icon))
                        <i class="bx {{$submenu->icon}} "></i>
                    @else
                        <i class="bx bx-right-arrow-alt"></i>
                    @endif

                        <span class="menu-item">{{ __($submenu->name) }} </span>
                </a>
                @if(isset($submenu->submenu))
                    @include('backend.panels.sidebar-submenu',['menu'=>$submenu->submenu])
                @endif
            </li>
        @endforeach
    @endif
</ul>


