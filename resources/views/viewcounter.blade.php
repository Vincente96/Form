<x-layout>
    <div class="container mt-5">
        <h1>Gestione utenti</h1>

        <div class="row  mt-3">
            <div class="col-4">
                <div class="bg-light rounded p-3">
                    <h3 class="mb-3">Aggiungi un utente</h3>
                    <livewire:user-form />
                </div>    
            </div>
            <div class="col-8">
                <h3 class="mb-3">Utenti</h3>
                <livewire:user-list />
            </div>
        </div>
    </div>
</x-layout>