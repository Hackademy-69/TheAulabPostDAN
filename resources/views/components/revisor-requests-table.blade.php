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
        @foreach($revisorRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('admin.make_user_revisor', $user) }}" class="btn btn-custom">Rendi revisore</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    