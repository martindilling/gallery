<div class="top-menu">
    <ol class="breadcrumb">
        @foreach($breadcrumb as $item)
            <li {{ is_null($item['url']) or 'class="active"' }}>
                @if($item['url'])
                    <a href="{{ $item['url'] }}">
                        {{ $item['text'] }}
                    </a>
                @else
                    {{ $item['text'] }}
                @endif
            </li>
        @endforeach
    </ol>
</div>
