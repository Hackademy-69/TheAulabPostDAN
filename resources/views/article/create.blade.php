<x-layout
    headerTitle="Inserisci articolo"
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

                <form class="card p-5 shadow" action="{{route('article.store')}}" method="post" enctype="multipart/form-data">
                
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{old('title')}}">
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitlo:</label>
                        <input name="subtitle" type="text" class="form-control" id="subtitle" value="{{old('subtitle')}}">
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" id="tags" class="form-control" value="{{old('tags')}}">
                        <span class="small fst-normal">Dividi ogni tag con una virgola</span>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Copertina:</label>
                        <input name="img" type="file" class="form-control" id="image">
                    </div>

                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" cols="30" rows="6" class="form-control">{{old('body')}}</textarea>
                    </div>

                    <div class="mt-2">
                        <button class="btn bg-main">Pubblica articolo</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-layout>