<x-layout
    headerTitle="Lavora con noi"
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

            <form class="card p-5 form-create" action="{{route('careers.submit')}}" method="post">
            
                @csrf

                <div class="mb-3">
                    <label for="role" class="form-label">Per quale posizione vuoi candidarti?</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Amministratore</option>
                        <option value="revisor">Revisore</option>
                        <option value="writer">Articolista</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
                </div>

                <div class="mb-3">
                    <label for="presentation" class="form-label">Perché dovremmo assumerti?</label>
                    <textarea name="presentation" id="presentation" cols="30" rows="6" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <button class="btn button-2" type="submit">Invia candidatura</button>
                </div>

            </form>

        </div>
    </div>
</div>


</x-layout>