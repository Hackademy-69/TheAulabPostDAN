<x-layout
    headerTitle="Modifica articolo"
>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="card p-5 shadow" action="{{route('article.update', compact('article'))}}" method="post" enctype="multipart/form-data">
                
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$article->title}}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitlo:</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{$article->subtitle}}">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" @if($article->category && $category->id == $article->category->id) selected @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" id="tags" class="form-control" value="{{$article->tags->implode('name', ' , ')}}">
                        <span class="small fst-normal">inserisci tag</span>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Copertina:</label>
                        <input name="img" type="file" class="form-control" id="image">
                    </div>
                    
                    
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" cols="30" rows="6" class="form-control">{{$article->body}}</textarea>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-custom" type="submit">Aggiorna articolo</button>
                        <a class="btn btn-custom" href="{{route('home')}}">Torna alla home</a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</x-layout>