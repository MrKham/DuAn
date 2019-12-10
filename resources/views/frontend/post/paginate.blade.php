@php
    function get_description($post) {
        return app()->getLocale() == 'vi' ? $post->description : $post->description_en;;
    }

    function pipeText($str, $n) {
        return strlen($str) >= $n ? mb_substr($str,  0, $n - 1, 'utf-8') . '...' : $str;
    }
@endphp
@foreach($posts as $post)
    <article class="col-lg-4 col-md-6">
        <figure class="figure">
            <a href="{{ url("/tin-tuc/$post->slug") }}">
                <img src="{{ url("/lbmediacenter/$post->image_id") }}" class="figure-img img-fluid" alt="{{ $post->name }}">
            </a>
            <a href="{{ url("/tin-tuc/$post->slug") }}">
                <figcaption class="figure-title">{{ app()->getLocale() == 'vi' ? $post->name : $post->name_en }}</figcaption>
            </a>
            <figcaption class="figure-caption figure-time">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</figcaption>
            <figcaption class="figure-caption" title="{{ get_description($post) }}">{{ pipeText(get_description($post), 200) }}</figcaption>
        </figure>
    </article>
@endforeach