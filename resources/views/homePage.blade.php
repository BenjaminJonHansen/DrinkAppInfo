<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="search-field">
        <form method="POST" action="/search" id="search-bar">
            {{ csrf_field() }}
            <input type="text" name="query" id="search" placeholder="Search Here.." value=""/>
            <button type="submit" id="btn-search">Søg</button>
        </form>

        <div id="drinks">

        </div>


        @vite('resources/js/app.js')

        <script>
            let form = document.querySelector('#search-bar');
            let input = document.querySelector('#search');
            
            console.log(form,input);

            input.addEventListener('keyup', function(event){
                let query = document.querySelector('#search');
                axios({
                    method: 'post',
                    url: '/search',
                    data: {
                        query: query.value,
                    }
                })  .then(function (response) {
                    let drinks = response.data.drinks;

                    document.querySelector('#drinks').innerHTML = drinks.map(cocktails => cocktails.strDrink).join('<br>');


                })
                .catch(function (error) {
                    console.log(error);
                });
            });
        </script>

            
    </section>
</body>
</html>