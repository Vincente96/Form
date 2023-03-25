<div>
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-end">
                    <button class="btn btn-primary btn-sm " wire:click="edit({{ $user->id }})">  modifica </button>
                    <button class="btn btn-danger btn-sm " wire:click="delete({{ $user->id }})"> elimina </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
