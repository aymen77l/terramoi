<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des comptes</title>
</head>
<body>
    <h1>Espace Admin — Gestion des comptes</h1>
    
    <form action="{{ route('logout') }}" method="POST" style="margin-bottom: 20px;">
		@csrf
		<button type="submit">Se déconnecter</button>
	</form>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <h2>Créer un espace personnel</h2>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nom complet" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <select name="role" required>
            <option value="client">Client</option>
            <option value="gestionnaire">Gestionnaire</option>
            <option value="admin">Administrateur</option>
        </select>
        <button type="submit">Créer</button>
    </form>

    <hr>

    <h2>Comptes existants</h2>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Supprimer ce compte ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: red;">Supprimer</button>
                            </form>
                        @else
                            <em>(Toi)</em>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
