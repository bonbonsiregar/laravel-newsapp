<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./app.css" rel="stylesheet">
    <title>laravel news app</title>
</head>
<body>
    <div>
        <h1 class="head__text font-sans text-4xl m-3">News App</h1></h1>
        <div class="all__news">
            @foreach($results as $berita)
            <div class="news">
            <h1 class="news_title">{{$berita['title']}}</h1>
            <p class="news__desc">{{$berita['description']}}</p>
            <span class="news__author">{{$berita['author']}}</span><br>
            <span class="news__published">{{$berita['publishedAt']}}</span>
            <span class="news__source">{{$berita['source']['name']}}</span><br>
            <a href="{{ $berita['url'] }}" target="_blank" class="news__url">Link</a>
            </div>
            @endforeach
            {{$results->links()}} 
        </div>
    </div>
</body>
</html>