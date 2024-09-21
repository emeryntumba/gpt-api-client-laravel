<!DOCTYPE html>
<html>
<head>
    <title>Résultat OpenAI</title>
</head>
<body>
    <h1>Réponse de l'API OpenAI</h1>

    @if(isset($response['error']))
        <p><strong>Erreur :</strong> {{ $response['error']['error']['message'] ?? 'Une erreur inconnue est survenue.' }}</p>
        <p><strong>Code de statut :</strong> {{ $response['status'] }}</p>
    @else
        <p><strong>Réponse :</strong> {{ $response }}</p>
    @endif


    <a href="{{ route('openai.index') }}">Revenir à la requête</a>
</body>
</html>
