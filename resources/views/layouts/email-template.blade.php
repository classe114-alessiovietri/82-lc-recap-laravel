<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Nuovo Contatto</title>

        <style>
            * {
                margin: 0;
                box-sizing: border-box;
                font-family: Arial, Helvetica, sans-serif;
            }
            *:not(ul, ol) {
                padding: 0;
            }
            body {
                background-color: #dedede;
            }
            .container {
                max-width: 800px;
                margin: 0 auto;
            }
            .card {
                width: 100%;
                margin: 30px 0;
                padding: 10px;
                background-color: white;
                border-radius: 10px;
            }
        </style>
    </head>
    <body>

        <main>
            <div class="container">
                <div class="card">
                    @yield('content')
                </div>
            </div>
        </main>

    </body>
</html>
