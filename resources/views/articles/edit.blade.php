<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <h1>Modifica articolo</h1>

                {{-- Errore --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif

                {{-- Success --}}
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form class="mt-4" action="{{ route('articles.update',$article) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-12">
                            @foreach($categories as $category)
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="categories[]"
                                       value="{{ $category->id }}"
                                       
                                       @if(old('categories'))
                                        @if(in_array($category->id, old('categories')))
                                            checked
                                        @endif
                                       @elseif($article->categories->contains($category->id))
                                         checked
                                         
                                       @endif>
                                       <label class="form-check-label">
                                        {{ $category->name }}
                                       </label>
                            </div>

                            

                                @endforeach


                            {{-- <label for="category_id">Categoria</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    @if($category->id === old('category_id', $article->category_id))
                                    selected
                                    @endif
                                    >{{ $category->name }}</option>
                                @endforeach
                            </select> --}}




                            @error('category') <span class="text-danger small">{{ $message }}</span>  @enderror
                        </div>
                        <div class="col-12">
                            <label for="title">Titolo</label>
                            <input type="text" id="title" name="title" class="form-control" maxlength="150"
                            value="{{ old('title', $article->title) }}">
                            @error('title') <span class="text-danger small">{{ $message }}</span>  @enderror
                        </div>
                        <div class="col-12">
                            <label for="body">Testo</label>
                            <textarea name="body" id="body" rows="10"class="form-control"
                            >{{ old('body') }}</textarea>
                            @error('body') <span class="text-danger small">{{ $message }}</span>  @enderror
                        </div>
                        <div class="col-12">
                            <label for="image">Immagine</label>
                            <input type="file" name="image" id="image" class="form-control">
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