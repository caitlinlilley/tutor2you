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
    flex-direction: column; /* Stack buttons vertically */
    align-items: flex-start; /* Align items to the start */
}

.sidebar h2 {
    color: #ff6f61;
    font-size: 24px;
    margin-bottom: 20px;
}

.nav-button {
    display: block;
    color: white;
    background-color: transparent; /* Transparent background */
    padding: 10px 15px; /* Padding for button */
    text-decoration: none;
    font-size: 18px;
    margin-bottom: 10px;
    border: none; /* Remove border */
    border-radius: 8px; /* Rounded corners */
    transition: background-color 0.3s, transform 0.3s; /* Transition for effects */
    width: 100%; /* Full width of the sidebar */
    text-align: left; /* Align text to the left */
}

.nav-button:hover {
    background-color: #575757; /* Background color on hover */
    transform: scale(1.05); /* Slightly increase size on hover */
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

    <div class="main-container">
        @auth
        <div class="sidebar">
            <h2>Navigation</h2>
            <button class="nav-button" onclick="location.href='/'">Home</button>
            <button class="nav-button" onclick="location.href='/find-tutor'">Find a Tutor</button>
            <button class="nav-button" onclick="location.href='/my-posts'">My Posts</button>
            <button class="nav-button" onclick="location.href='/my-profile'">My Profile</button>
            <button class="nav-button" onclick="location.href='/submit-feedback'">Submit Feedback</button>
        </div>
        @endauth
        
        <div class="content">
            <div class="container">
                <div class="logo">🎉 Welcome to Tutor2You 🎉</div>

                @auth
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-button">Log out</button>
                </form>
                <div class="welcome-message">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                </div>





                @else

                <div class="form-container"> 
                    <h2>Login to an existing account</h2>
                    <form action="/login" method="post">
                        @csrf
                        <input name="loginname" type="text" placeholder="Username">
                        <input name="loginpassword" type="password" placeholder="Password">
                        <button>Log in</button>
                    </form>
                </div>

                <div class="form-container"> 
                    <h2>Register</h2>
                    <form action="/register" method="post">
                        @csrf
                        <input name="name" type="text" placeholder="Username">
                        <input name="email" type="text" placeholder="Email">
                        <input name="password" type="password" placeholder="Password">
                        <button>Register</button>
                    </form>
                </div>
                <div class="requirements">
                    <h3>Username & Password Requirements:</h3>
                    <ul>
                        <li><strong>Username:</strong> Must be 3-20 characters long, must be unique.</li>
                        <li><strong>Password:</strong> Must be at least 8 characters long.</li>
                    </ul>
                </div>

                @endauth
            </div>
        </div>
    </div>

</body>
</html>
