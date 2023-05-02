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
        @foreach($writerRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.make_user_writer', $user) }}" class="btn button-2">Rendi articolista</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    