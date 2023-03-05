<x-layout>
    <h1 class="text-center">
        Crea un nuovo articolo
    </h1>

    @if ($errors -> any())
    <div class="alert alert-danger">
            @foreach ($errors-> all() as $error )
                <li> {{$error}}</li>
                {{-- error è una variabile di laravel che ci permette di trovare gli errori di validazione eseguendo un foreach di errors all() 
                    ci restituisce tutti gli errori di validazione  --}}
            @endforeach
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-6-mx-auto">
                @if(session()-> has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <form  class="mt-4" action="{{route('articles.store')}}" method="POST"   enctype="multipart/form-data">
                    
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="category">Categoria</label>
                            <input type="text" id="category" name="category" class="form-control @error('category') is-invalid @enderror" 
                            maxlength="50" value="{{old ('category')}}">
                            @error('category') 
                            {{-- seconda alternativa se vogliamo visualizzare il messaggio di errore ove è necessario --}}
                            <span class="text-danger small">{{$message}}</span>     
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="title">Titolo</label>
                            <input type="text" id="title" name="title" 
                            class="form-control @error('category') is-invalid @enderror" maxlength="150"
                            value="{{old ('title')}}">
                            @error('title') 
                            {{-- seconda alternativa se vogliamo visualizzare il messaggio di errore ove è necessario --}}
                            <span class="text-danger small">{{$message}}</span>     
                            @enderror
                        </div>
                        <div class="col-12">
                            <label for="body">Testo</label>
                            <textarea name="body" id="body"  rows="10"class="form-control @error('category') is-invalid @enderror ">{{old('body')}}</textarea>
                            @error('body') 
                            {{-- seconda alternativa se vogliamo visualizzare il messaggio di errore ove è necessario --}}
                            <span class="text-danger small">{{$message}}</span>     
                            @enderror

                            <div class="col-12">
                                <label for="image">Immagine</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salva</button>
                     </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>