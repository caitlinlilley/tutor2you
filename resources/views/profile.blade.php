<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor2You - My Profile</title>
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

        .profile-container {
            background: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }

        .profile-container:hover {
            transform: translateY(-5px);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-group input:focus {
            border-color: #ff6f61;
            outline: none;
        }

        .update-button {
            background-color: #ff6f61;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .update-button:hover {
            background-color: #e85850;
            transform: translateY(-3px);
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
                <div class="logo">🎉 Tutor2You 🎉</div>

                <div class="welcome-message">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                </div>
                

                @auth
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-button">Log out</button>
                </form>

                <div class="profile-container">
                    <h2>My Profile</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="/my-profile" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password (leave blank to keep current):</label>
                            <input type="password" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                        </div>
                        <button type="submit" class="update-button">Update Profile</button>
                    </form>
                </div>

                @else

                {{-- <div class="form-container"> 
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
                </div> --}}

                @endauth
            </div>
        </div>
    </div>

</body>
</html>
