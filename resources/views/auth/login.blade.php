<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <form action="/login" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                            @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password') <span class="text-danger small">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Accedi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>