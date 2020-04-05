
    @foreach(explode('#', $article->tags) as $value)
        @if(!empty($value))
            <a href="{{ route('article.tag', trim($value, " ")) }}" class="btn btn-outline-synergy" style="margin: 5px 10px;height: 35px;">{{ trim($value, " ") }}</a>
        @endif
    @endforeach
