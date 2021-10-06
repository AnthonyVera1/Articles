@extends('layout.app')

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Ajouter article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        
        <form action="" method="post" action="{{ action('App\Http\Controllers\ArticlesController@CreateArticles') }}">

            @csrf

            <div class="form-group">
                <label>Titre</label>
                <input type="text"name="title" id="title">
            </div>

            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </form>
    </div>
</body>

</html>