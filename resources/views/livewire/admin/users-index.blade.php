<div>
    <div class="card">

        <div class="card-header">
            <input class="form-control" wire:model="search" placeholder="Ingrese el nombre del user">
        </div>

        @if ($users->count())
            <div class="card-body">
                <table class="table table-stripes">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{ route('admin.users.edit', $user)}}">
                                        Editar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $users->links() }}
            </div>
        @else
            <div class="card-body">No hay ningún usuario con esos criterios de búsqueda</card-body>
        @endif

    </div>
</div>
