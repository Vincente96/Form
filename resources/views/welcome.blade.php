<x-layout>

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-4"> 
                <h1 class="text-info"> Articoli salvati</h1>
            </div>
       

        <div class="row">
            <hr>
            <div class="col-3">ID</div>
            <div class="col-3">Categoria</div>
            <div class="col-3">Titolo</div>
            <div class="col-3 mb-4">Articolo</div>
            <hr>
            @foreach ($articles as $article)
            <div class="col-3">{{$article->id}}</div>
            <div class="col-3">{{$article->category}}</div>
            <div class="col-3"><a href="{{route('detail', ['id' => $article->id])}}">{{$article->title}}</a></div>
            <div class="col-3">{{$article->body}}</div>
            <hr class="mt-3">
     
            @endforeach
        </div>
    </div>

</x-layout>
         
        
           