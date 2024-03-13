<aside class="sidebar">
    <div class="scrollbar-inner">

        <div class="user">
            <div class="user__info" data-toggle="dropdown">
                <img class="user__img" src="/img/profile-pics/8.jpg" alt="">
                <div>
                    <div class="user__name">{{ auth()->user()->name }}</div>
                    <div class="user__email">{{ auth()->user()->email }}</div>
                </div>
            </div>

            <div class="dropdown-menu">
                <a class="dropdown-item" href="">View Profile</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </div>

        <ul class="navigation">
            @php
                $sidemenu = config('constants.sidemenu');
            @endphp

            @foreach ($sidemenu as $menu)
                @php
                    $isActive = false;
                    $currentRouteName = request()->route()->getName();

                    if (
                        $menu['route_name'] == $currentRouteName ||
                        (array_key_exists('child_routes', $menu) && in_array($currentRouteName, $menu['child_routes']))
                    ) {
                        $isActive = true;
                    }
                @endphp

                <li class="{{ $isActive ? 'navigation__active' : '' }}">
                    <a href="{{ route($menu['route_name']) }}">
                        <i class="{{ $menu['icon'] }}"></i> {{ $menu['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>