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
                            <label for="category_id">Categoria</label>
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $category->id }}">
                                <label class="form-check-label">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach     
                                

                            {{-- <label for="category"> Categoria</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select> --}}



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