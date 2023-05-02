<table class="table striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Azioni</th>
        </tr>
    </thead>

    <tbody>
        @foreach($adminRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.make_user_admin', $user) }}" class="btn button-2">Rendi amministratore</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    