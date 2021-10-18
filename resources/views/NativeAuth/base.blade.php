<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <style type="text/css">
        .button {
          background-color: white; /* Green */
          border: 2px solid #4CAF50;
          color: black;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 24px;
        }
        .buttons {
            padding-top: 300px;
            padding-left: 500px;
        }
    </style>
</head>
<body>  
    <div class="buttons">
        <a href="{{ route('loginRoute')}}">
            <button class="button">Login</button>
        <a href="{{ route('NativeAuth.create')}}">
            <button class="button">Register</button>
        </a>
    </div>
</body>
</html>