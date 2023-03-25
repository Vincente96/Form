
<div class="container">
    <form wire:submit.prevent="store">
        <div class="row">
            <div class="col-6 ">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                @endif
                </div>
                <div class="row g-3">
                    <div class="class col-12">
                        <label for="name">Nome</label>
                        <input type="text" id="name" class="form-control" wire:model.lazy="user.name">
                        @error ('user.name') <span class="alert-alert danger text-danger"> {{ $message }}</span> @enderror
                    </div>
                    <div class="class col-12">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" wire:model.lazy="user.email">
                        @error ('user.email') <span class="alert-alert danger text-danger"> {{ $message }}</span> @enderror

                    </div>
                    <div class="class col-12">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" wire:model.lazy="password">
                        @error ('password') <span class="alert-alert danger text-danger"> {{ $message }}</span> @enderror

                    </div>
                    <div class="col-12">
                         <button class="btn btn-primary my-3 d-inline">Salva</button> 
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>