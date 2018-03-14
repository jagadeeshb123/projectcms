<aside class="col-md-4 blog-sidebar">

    <div class="p-3">
        <h4 class="font-italic">Categories of Posts</h4>
        <ol class=" mb-0">

            @if($post)
                @foreach($post as $item)
                    <li>{{$item->category->name}}</li>
                @endforeach
            @endif

        </ol>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Post Timeline</h4>
        <ul class="">
            @if($post)
                @for($i = 0; $i < sizeof($timearray); $i++)
                    <li>{{$timearray[$i]}}</li>
                @endfor
            @endif

        </ul>
    </div>
</aside><!-- /.blog-sidebar -->