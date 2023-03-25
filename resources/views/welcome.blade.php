<x-layout>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-4"> 
                <h1 class="text-info"> Articoli salvati</h1>
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

        <div class="row">
            <hr>
            <div class="col-2">ID</div>
            <div class="col-2">Categoria</div>
            <div class="col-2">Titolo</div>
            <div class="col-2 mb-4"> testo</div>
            <div class="col-2"> elimina </div>
            <div class="col-2"> modifica </div>
            <hr>
            @foreach ($articles as $article)
            <div class="col-2">{{$article->id}}</div>
            <div class="col-2"> 
                 <td>
                @foreach($article->categories as $category)
                    {{ $category->name }}<br>
                @endforeach
            </td>
          
            </div>
            <div class="col-2"><a href="{{route('detail', ['id' => $article->id])}}">{{$article->title}}</a></div>
            <div class="col-2">{{$article->body}}</div>
            <div class="col-2"> <form action="{{route('articles.destroy' , $article)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-danger ">
                    <i class="bi bi-trash-fill "> </i>
                </button>
               </form>
         </div>
            <div class="col-2"><a href="{{route('articles.edit',$article)}}"> Modifica </a> </div>
            <hr class="mt-3">
            @endforeach
        </div>
    </div>

</x-layout>
         
        
           