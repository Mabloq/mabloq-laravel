<div class="col-md-3 col-md-offset-1">
    <h2>Categories</h2>
    <hr>
    <div class="category-section">


      @foreach($categories as $category)
      <a href="{{ route('blog.category', $category->id)}}">
        <div class="col-md-6 category-img" style="background:url(/images/{{$category->image}})">

        <p class="category-link">{{$category->name}}</p>

        </div>
      </a>
      @endforeach
    </div>
    </div>

      <div class="col-md-3 col-md-offset-1">
        <h2>Tags</h2>
        <hr>
          @foreach($tags as $tag)
              <a href="{{ route('blog.tag', $tag->id)}}" class="blog-tag">{{$tag->name}}</a>
          @endforeach

      </div>
