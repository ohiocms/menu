@php
    $key = $section->param('menu');
    $menu = $key ? Menu::get($key) : null;
    if ($menu) {
        if ($active = $section->param('active')) {
            $menu->active($active);
        } else {
            $menu->guessActive($section);
        }
    }
@endphp

@if($menu)
    <div class="section section-block {{ $section->param('class') }}">
        @include('belt-content::sections.sections._heading')
        @include('belt-content::sections.sections._before')
        @include('belt-menu::menus.web.default')
        @include('belt-content::sections.sections._after')
    </div>
@else
    <p>section with empty menu</p>
@endif