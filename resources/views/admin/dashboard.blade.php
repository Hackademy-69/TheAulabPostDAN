<x-layout
    headerTitle="Dashboard">

    @if(session('message'))
        <div class="text-center">
            <span class="alert alert-success">
                    {{session('message')}}
            </span>
        </div>
    @endif

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5 form-create2">
            <h2 class="mb-3">Richieste di Amministratore</h2>
            <x-admin-requests-table :adminRequests="$adminRequests" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5 form-create2">
            <h2 class="mb-3">Richieste di Revisore</h2>
            <x-revisor-requests-table :revisorRequests="$revisorRequests" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5 form-create2">
            <h2 class="mb-3">Richieste di Articolista</h2>
            <x-writer-requests-table :writerRequests="$writerRequests" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5 form-create2">
            <h2 class="mb-3">I tags della piattaforma</h2>
            <x-metainfo-table :metaInfos="$tags" metaType="tags" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5 form-create2">
            <h2 class="mb-3">Le categorie della piattaforma</h2>
            <x-metainfo-table :metaInfos="$categories" metaType="categorie" />
            <form action="{{route('admin.storeCategory')}}" method="POST">
                @csrf
                <input type="text" name='name' class="form-control me-2" placeholder="Inserisci nuova categoria">
                <button type="submit" class="btn btn-custom">Aggiungi</button>
            </form>
        </div>
    </div>
</div>


</x-layout>