<x-layout
    headerTitle="Articoli in evidenza"
>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form class="d-flex flex-column justify-content-center" method="GET" action="{{route('article.search')}}">
                <input class="form-control me-2" type="search" name="query" placeholder="Cosa stai cercando?" aria-label="Search">
                <button class="btn btn-outline-info" type="submit">Cerca</button>    
            </form>
        </div>
    </div>
</div>



    @if(session('message'))
        <div class="text-center">
            <span class="alert alert-success">
                    {{session('message')}}
            </span>
        </div>    
    @endif

    <div class="container my-5">
        <div class="row justify-content-evenly">
            
            @foreach($articles as $article)
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card" style="width: 22rem;">
                        <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="{{$article->title}}">
                        <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{ substr($article->subtitle, 0, 20) }} ...</p>
                        <hr>
                        <a href="{{route('article.category', $article->category)}}" class="card-text">{{$article->category->name}}</a>
                        <br>
                        <a href="{{route('article.show', $article)}}" class="btn bg-main mt-3">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>


</x-layout>