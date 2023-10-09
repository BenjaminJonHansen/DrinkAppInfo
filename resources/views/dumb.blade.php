<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="search-field">
        <form method="GET" action="/dumb" id="search-bar">
            {{ csrf_field() }}
            <input type="text" name="query" id="search" placeholder="Search Here.." value=""/>
            <button type="submit" id="btn-search">Søg</button>
        </form>

        <div id="drinks">

    
        @foreach($drinks as $drink)
            <h1>{{$drink->strDrink}}</h1>
            <span>{{ $drink->strInstructions }}</span>
            <pre>{{ json_encode($drink,JSON_PRETTY_PRINT)}}</pre>
        @endforeach

        </div>


        @vite('resources/js/app.js')

            
    </section>
</body>
</html>