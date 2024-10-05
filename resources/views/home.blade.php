<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor2You</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap');
        
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #333;
            border-bottom: 3px solid #ff6f61;
            padding-bottom: 10px;
            font-size: 24px;
        }

        .auth-message {
            font-size: 18px;
            color: #28a745;
            margin-bottom: 20px;
        }

        .form-container, .posts-container {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }

        .form-container:hover, .posts-container:hover {
            transform: translateY(-5px);
        }

        input[type="text"], input[type="password"], textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ff6f61;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
            border-color: #ffa07a;
        }

        button {
            background-color: #ff6f61;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #e85850;
            transform: translateY(-3px);
        }

        .post {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 5px solid #ff6f61;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .post-title {
            font-size: 22px;
            color: #ff6f61;
            margin-bottom: 10px;
        }

        .post-description, .post-contact, .post-name {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .edit-link {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .edit-link:hover {
            text-decoration: underline;
        }

        .delete-form {
            display: inline;
        }

        .logo {
            font-size: 30px;
            color: #ff6f61;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo">🎉 Welcome to Tutor2You 🎉</div>

        @auth
        <p class="auth-message">You have successfully logged in</p>
        <form action="/logout" method="POST">
            @csrf
            <button>Log out</button>
        </form>

        <div class="form-container">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Course ID"> 
                <textarea name="body" placeholder="Qualifications, experience etc."></textarea>
                <textarea name="contact" placeholder="Contact Details"></textarea>
                <button>Post</button>
            </form>
        </div>

        <div class="posts-container">
            <h2>All Posts</h2>
            @foreach ($posts as $post)
                <div class="post">
                    <h3 class="post-title">Course: {{$post['title']}}</h3>
                    <p class="post-description">Description: {{$post['body']}}</p>
                    <p class="post-contact">Contact: {{$post['contact']}}</p>
                    <p class="post-name">Name: {{$post->user->name}}</p>
                </div>
            @endforeach
        </div>

        <div class="posts-container">
            <h2>My Posts</h2>
            @foreach ($userposts as $userpost)
                <div class="post" style="border-left: 5px solid #FFC107;">
                    <h3 class="post-title">Course: {{$userpost['title']}}</h3>
                    <p class="post-description">Description: {{$userpost['body']}}</p>
                    <p class="post-contact">Contact: {{$userpost['contact']}}</p>
                    <p><a class="edit-link" href="/edit-post/{{$userpost->id}}">Edit</a></p>
                    <form class="delete-form" action="/delete-post/{{$userpost->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        @else

        <div class="form-container"> 
            <h2>Login to an existing account</h2>
            <form action="/login" method="post">
                @csrf
                <input name="loginname" type="text" placeholder="Name">
                <input name="loginpassword" type="password" placeholder="Password">
                <button>Log in</button>
            </form>
        </div>

        <div class="form-container"> 
            <h2>Register</h2>
            <form action="/register" method="post">
                @csrf
                <input name="name" type="text" placeholder="Name">
                <input name="email" type="text" placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <button>Register</button>
            </form>
        </div>

        @endauth
    </div>

</body>
</html>
