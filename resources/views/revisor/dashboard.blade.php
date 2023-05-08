<x-layout
    headerTitle="Dashboard revisore"
>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 bg-light p-5">
            <h2 class="mb-3 display-5 fs-4">Annunci da revisionare</h2>
            <x-revisor-table :articles="$articles" />
        </div>
    </div>
</div>




</x-layout>