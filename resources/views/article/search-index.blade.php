<x-layout
    headerTitle="Articoli in evidenza"
    >

    
        <div class="container my-5">
            <div class="row justify-content-evenly">
                
                @foreach($articles as $article)
                    <div class="col-12 col-md-4">
                        <div class="card card-custom" style="width: 18rem;">
                            <img src="{{Storage::url($article->img)}}" class="card-img-top img-fluid rounded-5 img-custom" alt="{{$article->title}}">
                            <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->subtitle}} ...</p>
                            <hr>
                            <a href="{{route('article.category', $article->category)}}" class="card-text">{{$article->category->name}}</a>
                            <br>
                            <a href="{{route('article.show', $article)}}" class="btn bg-main mt-3 button-2">Leggi</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
              
            </div>
        </div>
    


</x-layout>