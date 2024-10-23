<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor2You - About Us</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;700&display=swap');
        
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            color: #333;
            height: 100vh; 
            display: flex;
            flex-direction: column; 
    
        }

        .main-container {
            display: flex;
            min-height: 100vh;
            opacity: 98%;
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
            flex-shrink: 0; 
            flex-grow: 0;
            height: 100vh;
            position: sticky;
            top: 0;
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
            font-weight: 400;
            
        }

        .nav-button:hover {
            background-color: #0047AB;
            transform: scale(1.05); 
            transition-duration: 0.4s ease;
            
            
        }

        .content {
            flex-grow: 1;
            flex-direction: row;
            padding: 20px;
        }

        h2 {
            color: #333;
            border-bottom: 3px solid #0047AB;
            padding-bottom: 10px;
            font-size: 20px; 
            margin-bottom: 10px; 
        }

        h3 {
            color: #333;
            padding-bottom: 10px;
            font-size: 20px; 
            margin-bottom: 10px; 
        }

        .auth-message {
            font-size: 16px;
            color: #0047AB;
            margin: 0;
            position: absolute;
            top: 20px;
            right: 20px;
            font-weight: bold;
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


        button:hover {
            background-color: #0047AB;
            transform: translateY(-3px);
        }

        .logo {
            font-size: 30px;
            color: #0047AB;
            text-align: center;
            letter-spacing: 5px;
            margin: 20px 0;
            font-weight: bold;
        }

        .error {
            color: red;
            font-size: 15px;
            margin-top: 5px;
        }

        
        .mission, .team {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .mission h2, .team h2 {
            color: #0047AB;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .mission p, .team p {
            font-size: 18px;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .team .member {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .team .member img {
            border-radius: 50%;
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }

        .team .member h3 {
            margin: 0;
            font-size: 20px;
            color: #0047AB;
        }

        .team .member p {
            margin: 0;
            font-size: 16px;
        }

    </style>
</head>
<body>

    <div class="main-container">
        
        <div class="sidebar">
            <h2>Navigation</h2>
            <button class="nav-button" onclick="location.href='/'">Home</button>
            <button class="nav-button" onclick="location.href='/about-us'"><span class="colour-onpage">About Us</span></button>
            <button class="nav-button" onclick="location.href='/find-tutor'">All Posts</button>
            <button class="nav-button" onclick="location.href='/my-posts'">My Posts</button>
            <button class="nav-button" onclick="location.href='/my-profile'">My Profile</button>
            <button class="nav-button" onclick="location.href='/contact-us'">Contact Us</button>
        </div>
    
        
        <div class="content">
            <div class="container">
                <div class="logo">📚🎓 Tutor2You 📚🎓</div>
            
                @auth
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    
                    <button class="logout-button">Log out</button>
                </form>
                <div class="welcome-message">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                </div>

                <div class="content">

                    <div class="mission">
                        <h2>Our Mission</h2>
                        <p>We’re a group of university students on a mission to make finding the right tutor <span style="color: #0047AB;">easy, stress-free, and tailored to your needs</span>.</p>
                        <p>Tutor2You was born out of our frustration with the limitations of existing tutoring services. We believe the process should be <span style="color: #0047AB;">quick and effective</span>, so you can focus more on learning and less on searching!</p>
                    </div>

                    <div class="team">
                        <h2>Meet the Team</h2>
                        <div class="member">
                            <img src="{{ asset('images/joeyavatar.png') }}">
                            <div>
                                <h3>Joseph Fonteyn</h3>
                                <p>Co-Founder & CEO</p>
                            </div>
                        </div>
                        <div class="member">
                            <img src="{{ asset('images/caitlinavatar.png') }}">
                            <div>
                                <h3>Caitlin Lilley</h3>
                                <p>Co-Founder & CIO</p>
                            </div>
                        </div>
                        <div class="member">
                            <img src="{{ asset('images/oliveravatar.png') }}">
                            <div>
                                <h3>Oliver Zarak</h3>
                                <p>Co-Founder & CFO</p>
                            </div>
                        </div>
                        <div class="member">
                            <img src="{{ asset('images/zhanghengavatar.png') }}">
                            <div>
                                <h3>Zhangheng Xu</h3>
                                <p>Co-Founder & COO</p>
                            </div>
                        </div>
                        
                    </div>


                    
                    
                </div>
            </div>

            @else
        
        @endauth
        
            </div>
        </div>
    </div>

</body>
</html>
