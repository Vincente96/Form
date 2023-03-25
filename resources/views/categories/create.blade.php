<x-layout>
    


    
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-5">Crea una nuova categoria</h1>
                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @error('name')
                            <span class=" text-danger small"> {{$message}}</span>
                            @enderror
                                                  
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Salva</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>