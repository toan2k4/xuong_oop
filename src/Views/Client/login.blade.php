<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        @if (!empty($_SESSION['errors']) && isset($_GET['msg']))
        <div class="alert alert-warning">
            {{$_SESSION['errors']}}
            @php
                unset($_SESSION['errors']);
            @endphp
        </div>
    @endif
        <form action="{{ url('handle-login') }}" method="POST">
            <div class="mb-3 mt-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</body>

</html>
