<p>
    <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
    @include('objects.news.action_buttons')
</p>
