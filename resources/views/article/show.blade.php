<x-layout
    headerTitle="{{$article->title}}"
>

    <div class="container my-5">
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
            <div class="text-end">
                <a href="{{route('home')}}" class="btn bg-dark text-light">Torna alla home</a>
            </div>
        </div>
    </div>


</x-layout>