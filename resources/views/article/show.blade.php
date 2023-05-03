<x-layout-detail>

    <div class="container bg-detail">
        <h1 class="pt-5 text-center">{{$article->title}}</h1>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <img src="{{Storage::url($article->img)}}" alt="{{$article->img}}" class="img-fluid my-3">

                <h3 class="sub-text">{{$article->subtitle}}</h3>

                <p class="fst-normal tag-text "><a href="{{route('article.category', $article->category)}}" class="card-text">{{$article->category->name}}</a></p>
                
                <p class="small fst-normal">
                    @foreach ($article->tags as $tag)
                    #{{$tag->name}}
                    @endforeach
                </p>

                <p class="my-5 fs-5">{{$article->body}}</p>

                <hr>

                <p class="fst-italic small">Redatto da: {{$article->user->name}}</p>
                <p class="fst-italic small">Pubblicato il: {{$article->created_at->format('d/m/Y')}}</p>

            </div>
            <div class="text-end mb-3 me-3">
                <a href="{{route('home')}}" class="btn btn-custom">Torna alla home</a>
            </div>
        </div>
    </div>


</x-layout-detail>





@if($metaType == 'tags')
<td>
    <form action="" method="">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="Nuovo nome tag" class="form-control d-50 d-inline">
        <button type="submit" class="btn button-2">Aggiorna</button>
    </form>
</td>
<td>
    <form action="" method="">
        @csrf
        @method('delete')
        <button type="submit" class="btn button-2">Elimina</button>
    </form>
</td>  
@else
<td>
    <form action="" method="">
        @csrf
        @method('put')
        <input type="text" name="name" placeholder="Nuovo nome categoria" class="form-control d-50 d-inline">
        <button type="submit" class="btn button-2">Aggiorna</button>
    </form>
</td>
<td>
    <form action="" method="">
        @csrf
        @method('delete')
        <button type="submit" class="btn button-2">Elimina</button>
    </form>
</td>      
@endif