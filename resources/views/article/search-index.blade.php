<x-layout
    headerTitle="Articoli in evidenza"
    >

    
        <div class="container my-5">
            <div class="row justify-content-evenly">
                
                @foreach($articles as $article)
                    <div class="col-12 col-md-4">
                        <div class="card" style="width: 22rem;">
                            <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="{{$article->title}}">
                            <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{ substr($article->subtitle, 0, 20) }}</p>
                            <hr>
                            <a href="{{route('article.category', $article->category)}}" class="category-style">{{$article->category->name}}</a>
                            <p class="fst-normal tag-text">
                                @foreach ($article->tags as $tag)
                                #{{$tag->name}}
                                @endforeach
                            </p>
                            <br>
                            <a href="{{route('article.show', $article)}}" class="btn button-2 mt-3">Leggi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
              
            </div>
        </div>
    


</x-layout>