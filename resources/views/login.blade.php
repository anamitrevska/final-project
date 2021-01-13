<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Final-Project</title>
        {{-- Styles --}}

        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body class="text-center">
        <form class="form-signin col-md-4 mx-auto my-4">
        <div style="background-image: url(/img/background1.jpg); height: 157px;" class="d-flex text-center">
          <h1 class="h4 font-weight-normal mx-auto my-auto text-dark" style="color: darkgray;">Log In</h1>
        </div>
          <label for="inputUser" class="sr-only">Username</label>
          <input type="text" id="inputUser" class="form-control mb-2" placeholder="Username" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
          <p class="mt-5 mb-3 text-muted">&copy; Ana Mitrevska</p>
        </form>
      </body>
</html>
