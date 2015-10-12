<div class="header">
    <div class="top-menu">
        <ol class="breadcrumb">
            @foreach($breadcrumb as $item)
                <li {{ is_null($item['url']) or 'class="active"' }}>
                    @if($item['url'])<a href="{{ url('/') }}">@endif
                        {{ $item['text'] }}
                    @if($item['url'])</a>@endif
                </li>
            @endforeach
        </ol>
    </div>

    <div class="page-title">
        <h1>{!! $title !!}</h1>
    </div>

    @if($description)
        <div class="page-description">
            <div class="card card-block text-center text-muted">
                <p class="card-text">{!! $description !!}</p>
            </div>
        </div>
    @endif
</div>