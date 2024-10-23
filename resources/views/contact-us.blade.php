<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor2You - Contact Us</title>
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
            padding: 10px 15px; 
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 10px;
            border: none; 
            border-radius: 8px; 
            transition: background-color 0.3s, transform 0.3s; 
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

        .logo {
            font-size: 30px;
            color: #0047AB;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }

        .contact-info {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .contact-info h2 {
            color: #0047AB;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .contact-us p {
            font-size: 18px;
            margin-bottom: 10px;
            line-height: 1.6;
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

                <div class="welcome-message">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                </div>
                

                @auth
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    @csrf
                    <button class="logout-button">Log out</button>
                </form>


            <div class="contact-info">
                <h2>Contact Us</h2>
                <p>If you have any questions or feedback, please feel free to contact us via email at: <span style="color: #0047AB;">info@Tutor2You.com.au</span>.</p>
                <p>We look forward to hearing from you!</p>
            </div>

               

                @else


                @endauth
            </div>
        </div>
    </div>

</body>
</html>