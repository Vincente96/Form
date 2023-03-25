<div class="container mt-5 bg-primary">
    <h1 class="text-center text-light">
        Counter
    </h1>
    <div class="row">
        <div class="col-6 mx-auto">
            <button class="btn btn-warning btn-lg" wire:click="increment">
                Incrementa
            </button>
        </div>
        <div class="col-12 text-center h1">
            {{$counter}}
        </div>
    </div>
</div>