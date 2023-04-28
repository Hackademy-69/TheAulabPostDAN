<x-layout
    headerTitle="Dashboard"
>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5">
            <h2 class="mb-3">Richieste di Amministratore</h2>
            <x-admin-requests-table :adminRequests="$adminRequests" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5">
            <h2 class="mb-3">Richieste di Revisore</h2>
            <x-revisor-requests-table :revisorRequests="$revisorRequests" />
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5">
            <h2 class="mb-3">Richieste di Articolista</h2>
            <x-writer-requests-table :writerRequests="$writerRequests" />
        </div>
    </div>
</div>


</x-layout>