<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1 class="mb-5">Modifica una categoria</h1>

                @if (session()->has('success'))
                <div class='alert alert-success'>
                     {{session('success')}}
                </div>
                @endif

                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Nome</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}">
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