<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor2You - All Posts</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap');

        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
        width: 250px;
        background-color: #929191;
        color: white;
        padding: 20px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column; 
        align-items: flex-start; 
         }

        .sidebar h2 {
        color: #0047AB;
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
            border-bottom: 3px solid #0047AB;
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
            background-color: #0047AB;
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
            background-color: #0047AB;
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
            border-left: 5px solid #0047AB;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .post-title {
            font-size: 22px;
            color: #0047AB;
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
            color: #0047AB;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }

        .search-bar {
            display: flex;
            margin-bottom: 20px;
        }

        .search-input {
            flex-grow: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }

        .search-button {
            padding: 10px;
            font-size: 16px;
            background-color: #0047AB;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .search-button:hover {
            background-color: #0047AB;
            transform: translateY(-3px);
        }

        .all-posts-button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            margin-left: 10px;
        }

        .all-posts-button:hover {
            background-color: #45a049;
            transform: translateY(-3px);
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
            <button class="nav-button" onclick="location.href='/contact-us'">Contact Us</button>
        </div>
        @endauth
        
        <div class="content">
            <div class="container">
                <div class="logo">📚🎓 Tutor2You 📚🎓</div>

                @auth
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-button">Log out</button>
                </form>
                <div class="welcome-message">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                </div>

                <div class="search-bar">
                    <form action="{{ url('/search') }}" method="GET">
                        <input type="text" name="query" class="search-input" placeholder="Search Course Code...">
                        <button type="submit" class="search-button">Search</button>
                        <button type="button" class="all-posts-button" onclick="window.location.href='{{ url('/find-tutor') }}'"> Show All Posts</button>
                    </form>
                </div>

                <div class="posts-container">
                    <h2>All Posts</h2>
                    @if($allposts->isEmpty())
                        <p>No posts found matching your search for "{{ $query }}".</p>
                    @else
                        @foreach ($allposts as $allpost)
                            <div class="post">
                                <h3 class="post-title">Course: {{$allpost['title']}}</h3>
                                <p class="post-description">Description: {{$allpost['body']}}</p>
                                <p class="post-contact">Contact: {{$allpost['contact']}}</p>
                                @if ($allpost->user)
                                <p class="post-name">Posted by: <a href="{{ route('user.profile', ['user' => $allpost->user->id]) }}">{{ $allpost->user->name }}</a></p>
                            @else
                                <p class="post-name">Posted by: Unknown</p>
                            @endif
                            </div>
                        @endforeach
                    @endif
                </div>

                @else


                @endauth
            </div>
        </div>
    </div>


</body>
</html>


