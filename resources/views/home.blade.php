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
        <textarea name="contact" placeholder="Contact Details"></textarea>
        <button>Post</button>
    </form>
    </div>

    <div>
        <h2>All Posts</h2>
       @foreach ($posts as $post)
           <div style="background-color:gray;padding:10px;margin:10px">
            <h3>Course: {{$post['title']}}</h3>
            <p>Description: {{$post['body']}}</p>
            <p>Contact: {{$post['contact']}}</p>
            <p>Name: {{$post->user->name}}</p>
           </div>
       @endforeach
        </div>

        <div>
            <h2>My Posts</h2>
           @foreach ($userposts as $userpost)
               <div style="background-color:pink;padding:10px;margin:10px">
                <h3>Course: {{$post['title']}}</h3>
                <p>Description: {{$post['body']}}</p>
                <p>Contact: {{$post['contact']}}</p>
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
                </form>
               </div>
           @endforeach
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