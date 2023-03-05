<x-layout>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-6">
                {{$article->title}}
            </div>
            <div class="col-6">
                <img class="img-thumbnail" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <a class="btn btn-primary " href="{{route('welcome')}}"> <i class="bi bi-skip-backward"></i> </a>

        </div>
    </div>
</x-layout>