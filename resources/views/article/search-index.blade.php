<x-layout
    headerTitle="Articoli in evidenza"
    >

    
        <div class="container my-5">
            <div class="row justify-content-evenly">
                
                @foreach($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex justify-content-center">
                        <div class="card card-custom" style="width: 22rem;">
                            <img src="{{Storage::url($article->img)}}" class="card-img-top card-img-custom" alt="{{$article->title}}">
                            <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{ substr($article->subtitle, 0, 20) }}</p>
                            <hr>
                            @if($article->category)
                            <a href="{{route('article.category', $article->category)}}" class="category-style">{{$article->category->name}}</a>
                            @else
                            <p>Non categorizzato</p>
                            @endif
                            <span class="text-muted small fst-normal">-tempo di lettura {{$article->readDuration()}} min</span>
                            <p class="fst-normal tag-text">
                                @foreach ($article->tags as $tag)
                                #{{$tag->name}}
                                @endforeach
                            </p>
                            <br>
                            <a href="{{route('article.show', $article)}}" class="btn btn-custom mt-3">Leggi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
              
            </div>
        </div>
    


</x-layout>