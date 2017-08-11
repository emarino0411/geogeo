<section class="hero is-fullheight is-default is-bold welcome">
    <div class="hero-body">
        <div class="container">

            @foreach($list as $item)
                <div class="column is-full-desktop">
                    <h1 class="blog-timestamp">
                        {{\Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->diffForHumans()}} from {{$item->location}} ( {{number_format((float)$item->distance, 1, '.', '')}} miles away )
                    </h1>
                    <h1 class="blog-title">
                        <a href="/view/{{$item->id}}/{{$item->slug}}"><b>{{$item->title}}</b></a>
                    </h1>
                    <h2 class="blog-summary">
                        {!! $item->content !!}
                    </h2>
                </div>
            @endforeach

            @if(count($list) == 1)
                    <a href="/" class="button is-info"><< back home</a>

                    <br><br><br>## Comment Box PlaceHolder ##
            @endif

        </div>
    </div>

    <div class="hero-foot">
        <div class="container">
            <div class="tabs is-centered" style="display: none;">
                <ul>
                    <li><a href="#">View more posts</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>