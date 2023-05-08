<x-layout-detail>

    <div class="container bg-detail">
        <h1 class="py-5 text-center">{{$article->title}}</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <img src="{{Storage::url($article->img)}}" alt="{{$article->img}}" class="img-fluid mb-3">

                <h3>{{$article->subtitle}}</h3>
                <p class="fst-italic small text-decoration-underline"><a href="{{route('article.category', $article->category)}}" class="card-text">{{$article->category->name}}</a></p>

                <p class="my-5">{{$article->body}}</p>

                <hr>

                <p class="fst-italic small">Redatto da: {{$article->user->name}}</p>
                <p class="fst-italic small">Pubblicato il: {{$article->created_at->format('d/m/Y')}}</p>

            </div>

            <div class="d-flex justify-content-center text-center mt-5 mb-3">
                <a href="{{route('revisor.accept', $article)}}" class="btn btn-success">Accetta articolo</a>
                <a href="{{route('revisor.dashboard')}}" class="btn btn-custom mx-5">Torna alla dashboard del revisore</a>
                <a href="{{route('revisor.reject', $article)}}" class="btn btn-danger">Rifiuta articolo</a>
            </div>
        </div>
    </div>


</x-layout>