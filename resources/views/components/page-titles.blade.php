@php
    $segments = Request::segments();
    $titlesArray = [];
    $url = '';
    foreach ($segments as $index => $segment) {
        $url = $url . '/' . $segment;
        $titlesArray[] = [
            'title' => ucfirst(str_replace('-', ' ', $segment)),
            'link' => $index < count($segments) - 1 ? url($url) : '',
            'title_key' => $segment,
        ];
    }
@endphp

<div class="col-xl-12">
    <div class="page-titles">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                @foreach ($titlesArray as $index => $item)
                    @php
                        if ($index === 0 || is_numeric($segments[$index])) {
                            continue;
                        }
                    @endphp
                    @if ($index === 1)
                        <li class="breadcrumb-item">
                            <a>{{ __("language.admin.{$item['title_key']}") }}</a>
                        </li>
                    @elseif ($index === count($titlesArray) - 1)
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ __("language.admin.{$item['title_key']}") }}
                        </li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{ $item['link'] }}">{{ __("language.admin.{$item['title_key']}") }}</a>
                        </li>
                    @endif
                @endforeach
            </ol>
        </nav>
    </div>
</div>
