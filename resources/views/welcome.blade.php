<x-layout
    headerTitle="Articoli in evidenza">
    

    @if(session('message'))
        <div class="text-center">
            <span class="alert alert-success">
                    {{session('message')}}
            </span>
        </div>    
    @endif
    
    <div class="container my-5">
        <div class="row">
            
            @foreach($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 mt-4 d-flex justify-content-center">
                    <div class="card card-custom" style="width: 22rem;">
                        <img src="{{Storage::url($article->img)}}" class="card-img-top card-img-custom" alt="{{$article->title}}">
                        <div class="card-body">
                            <p>{{$article->created_at->format('d/m/Y')}}</p>
                        <h5 class="card-title mb-0">{{$article->title}}</h5>
                        <p class="card-text mb-0">{{ substr($article->subtitle, 0, 20)}}...</p>
                        <hr>
                        @if($article->category)
                        <a href="{{route('article.category', $article->category)}}" class="category-style">{{$article->category->name}}</a>
                        @else
                        <p>Non categorizzato</p>
                        @endif
                        <p class="fst-normal tag-text">
                            @foreach ($article->tags as $tag)
                            #{{$tag->name}}
                            @endforeach
                        </p>
                        <a href="{{route('article.show', $article)}}" class="btn btn-custom">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

</x-layout>