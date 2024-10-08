<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor2You - My Posts</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap');

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .form-container {
        background: #fff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: transform 0.2s ease-in-out;
         }

        .form-container:hover {
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


        .main-container {
            display: flex;
            min-height: 100vh;
        }

            .sidebar {
        width: 250px;
        background-color: #333;
        color: white;
        padding: 20px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column; 
        align-items: flex-start; 
    }

    .sidebar h2 {
        color: #ff6f61;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .nav-button {
        display: block;
        color: white;
        background-color: transparent; 
        padding: 10px 15px; /* Padding for button */
        text-decoration: none;
        font-size: 18px;
        margin-bottom: 10px;
        border: none; 
        border-radius: 8px; /* Rounded corners */
        transition: background-color 0.3s, transform 0.3s; /* Transition for effects */
        width: 100%; 
        text-align: left; 
    }

    .nav-button:hover {
        background-color: #575757; 
        transform: scale(1.05); 
    }


        .content {
            flex-grow: 1;
            padding: 20px;
            position: relative;
        }

        h2 {
            color: #333;
            border-bottom: 3px solid #ff6f61;
            padding-bottom: 10px;
            font-size: 24px;
        }

        .auth-message {
            font-size: 14px;
            color: #28a745;
            margin: 0;
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .logout-button {
            background-color: #ff6f61;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            position: absolute;
            top: 50px;
            right: 20px;
        }

        .logout-button:hover {
            background-color: #e85850;
            transform: translateY(-3px);
        }

        .posts-container {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }

        .posts-container:hover {
            transform: translateY(-5px);
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

    <div class="main-container">
        @auth
        <div class="sidebar">
            <h2>Navigation</h2>
            <button class="nav-button" onclick="location.href='/'">Home</button>
            <button class="nav-button" onclick="location.href='/about-us'">About Us</button>
            <button class="nav-button" onclick="location.href='/find-tutor'">All Posts</button>
            <button class="nav-button" onclick="location.href='/my-posts'">My Posts</button>
            <button class="nav-button" onclick="location.href='/my-profile'">My Profile</button>
            <button class="nav-button" onclick="location.href='/submit-feedback'">Submit Feedback</button>
            <button class="nav-button" onclick="location.href='/contact-us'">Contact Us</button>
        </div>
        @endauth
        
        <div class="content">
            <div class="container">
                <div class="logo">🎉 Tutor2You 🎉</div>

                @auth
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-button">Log out</button>
                </form>
                <div class="welcome-message">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                </div>

                <div class="form-container">
                    <h2>Create a New Post</h2>
                    <form action="/create-post" method="POST">
                        @csrf
                        <input type="text" name="title" placeholder="Course ID" required>
                        <textarea name="body" placeholder="Experience, availability etc." required></textarea>
                        <textarea name="contact" placeholder="Contact Details" required></textarea>
                        <button type="submit">Post</button>
                    </form>
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


                @endauth
            </div>
        </div>
    </div>

</body>
</html>



