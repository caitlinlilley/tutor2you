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
            background-color: #fff;
            margin: 0;
            padding: 0;
            color: #000;
        }

        .main-container {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #0047AB;
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
            padding: 10px 15px; 
            text-decoration: none;
            font-size: 18px;
            margin-bottom: 10px;
            border: none; 
            border-radius: 8px; 
            transition: background-color 0.3s, transform 0.3s; 
            width: 100%; 
            text-align: left; 
            font-weight: 400;
            
        }

        .nav-button:hover {
            background-color: #ff6f61;
            transform: scale(1.05); 
            transition-duration: 0.4s ease;
            
            
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            position: relative;
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
            font-size: 40px;
            color: #0047AB;
            text-align: center;
            letter-spacing: 5px;
            margin: 20px 0;
        }

        .aboutus {
            margin-top: 30px;
            float: left;
            width: 43%;
            font-size: 18px;
            color: #000;
            line-height: 32px;
            letter-spacing: 2px;
            padding-left: 80px;
            margin: 90px auto 0 auto;
            font-weight: 400;
            max-width: 600px;
        }
        .aboutusimage {
            width: 329px;
            height: 439px;
            padding: 50px;
            position: sticky;
            float: right;
            margin-right: 115px;
            margin-top: 60px;
          
        }
        .colour-onpage {
            color: #ff6f61;;
            font-weight: 600;
        }

        .nav-button:hover .colour-onpage {
            color: #fff;
        }

        
        
    </style>
</head>
<body>

    <div class="main-container">
        
        <div class="sidebar">
            <h2>Tutor2You</h2>
            <button class="nav-button" onclick="location.href='/'">Home</button>
            <button class="nav-button" onclick="location.href='/about-us'"><span class="colour-onpage">About Us</span></button>
            <button class="nav-button" onclick="location.href='/find-tutor'">All Posts</button>
            <button class="nav-button" onclick="location.href='/my-posts'">My Posts</button>
            <button class="nav-button" onclick="location.href='/my-profile'">My Profile</button>
            <button class="nav-button" onclick="location.href='/submit-feedback'">Submit Feedback</button>
            <button class="nav-button" onclick="location.href='/contact-us'">Contact Us</button>
        </div>
    
        
        <div class="content">
            <div class="container">
                <div class="logo">🎉 <u><b>Tutor2You - About Us</b> </u> 🎉</div>

            
                    <div class="aboutus">
                    <p>Hi {{ Auth::user()->name }}
                        <br>
                        <br>
                         <b> <span style="color: #0047AB;"> Welcome to Tutor2You !</span> </b>
                        <br>
                        <br>
                        We’re a group of university students on a mission to make finding the right tutor <b>easy, stress-free 
                        and tailored to your needs. </b>
                        <br>
                        <br>
                        Tutor2You was born out of our frustration with the limitations of existing tutoring services. 
                        We believe the process should be <b> <span style="color: #0047AB;">quick and effective</b></span>, 
                        so you can focus more on learning and less on searching ! </p>
                        <br>
                        <br>
                    </p>
                </div>
            
            <img class="aboutusimage" src="images/aboutus.JPG">



                
                

            
                <p class="auth-message">You have successfully logged in</p>
                <form action="/logout" method="POST">
                    
                    <button class="logout-button">Log out</button>
                </form>

               

               
            </div>
        </div>
    </div>

</body>
</html>
