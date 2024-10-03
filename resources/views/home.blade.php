<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
     <p>You have successfully logged in<p>
     <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <div>
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Course ID"> 
        <textarea name="body" placeholder="Qualifications, experience etc."></textarea>
        <textarea name="body" placeholder="Contact Details"></textarea>
        <button>Post</button>
    </form>

    </div>

    @else


    <div> 
        <h2>Register</h2>
        <form action="/register" method="post">
            @csrf
            <input name="name" type="text" placeholder= "name">
            <input name="email" type="text" placeholder= "email">
            <input name="password" type="password" placeholder= "password">
            <button>Register</button>
        </form>
        </div>

        <div> 
            <h2>Login to an existing account</h2>
            <form action="/login" method="post">
                @csrf
                <input name="loginname" type="text" placeholder= "name">
                <input name="loginpassword" type="password" placeholder= "password">
                <button>Log in</button>
            </form>
            </div>

    @endauth

   
</body>
</html>