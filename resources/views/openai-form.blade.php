<!DOCTYPE html>
<html>
<head>
    <title>OpenAI API Request</title>
</head>
<body>
    <h1>Générer une réponse OpenAI</h1>

    <form action="{{ route('openai.sendRequest') }}" method="POST">
        @csrf
        <label for="prompt">Entrez votre requête :</label>
        <textarea id="prompt" name="prompt" rows="4" cols="50"></textarea>
        <br>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>
