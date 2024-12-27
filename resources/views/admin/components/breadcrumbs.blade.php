<ol class="breadcrumb">
    @foreach ($breadcrumbs as $breadcrumb)
        @if (!$loop->last)
            <!-- Nếu không phải phần tử cuối cùng, hiển thị liên kết -->
            <li class="breadcrumb-item">
                <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
            </li>
        @else
            <!-- Nếu là phần tử cuối cùng, không hiển thị liên kết, chỉ hiển thị tiêu đề -->
            <li class="breadcrumb-item active" aria-current="page">
                {{ !empty($title) ? $title : $breadcrumb['title'] }}
            </li>
        @endif
    @endforeach
</ol>
