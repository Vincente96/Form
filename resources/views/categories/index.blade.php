<x-layout>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col-6">
                <h1>Categorie disponibili</h1>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('categories.create') }}" class="btn btn-primary">Crea Categoria</a>
            </div>
        </div> 


        @if (session()->has('success'))
    <div class='alert alert-success'>
         {{session('success')}}
    </div>
    @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th> Articoli Collegati </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            @foreach ($category->articles as $article )
                            <a href="{{route('articles.edit',$article)}}"> {{$article->title}}</a>
                                
                            @endforeach
                        </td>
                        <td class="text-end">
                            <a href="{{ route('categories.edit', $category) }}" class="text-secondary">modifica</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">cancella</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>