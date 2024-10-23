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

        button {
            background-color: #0047AB;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #0047AB;
            transform: translateY(-3px);
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
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        .logo {
            font-size: 30px;
            color: #0047AB;
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
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

        h2 {
            color: #333;
            border-bottom: 3px solid #0047AB;
            padding-bottom: 10px;
            font-size: 24px;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .profile-details {
            width: 100%;
            max-width: 600px;
            text-align: left;
        }

        .profile-details p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .profile-details strong {
            display: inline-block;
            width: 150px;
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #0047AB;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #0047AB;
        }

        .feedback-form {
            width: 100%;
            max-width: 600px;
            margin-bottom: 30px;

        }

        .feedback-form textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            resize: vertical;
            margin-bottom: 10px;
        }

        .feedback-form button {
            width: 100%;
        }

        .feedback-list {
            width: 100%;
            max-width: 600px;
        }

        .feedback-item {
            background-color: #f9f9f9;
            border: 1px solid #eee;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .feedback-item p {
            margin: 0;
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

                <div class="profile-container">
                    <h2>{{ $user->name }}'s Profile</h2>
                    <div class="profile-details">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Bio:</strong> {{ $user->bio }}</p>
                        <p><strong>Course Expertise:</strong> {{ $user->expertise }}</p>
                        <p><strong>Availability:</strong> {{ $user->availability }}</p>
                        <p><strong>Pricing:</strong> {{ $user->pricing }}</p>
                        <p><strong>Qualifications:</strong> {{ $user->qualifications }}</p>
                    </div>
                    <a href="{{ url()->previous() }}" class="back-button">Back</a>
                </div>

                <div class="feedback-form">
                    <h2>Submit Feedback on {{ $user->name }}</h2>
                    <form action="{{ url('/submit-feedback') }}" method="POST">
                        @csrf
                        <textarea name="feedback" placeholder="Write your feedback here..." required></textarea>
                        <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                        <button type="submit">Submit Feedback</button>
                    </form>
                </div>

                <div class="feedback-list">
                    <h2>View {{ $user->name }}'s Feedback</h2>
                    @foreach ($feedbacks as $feedback)
                        <div class="feedback-item">
                            <p>{{ $feedback->content }}</p>
                            <small>
                                Submitted by: 
                                {{ $feedback->submittedBy ? $feedback->submittedBy->name : 'Unknown User' }} 
                                on {{ $feedback->created_at }}
                            </small> 
                        </div>
                    @endforeach
                    @if ($feedbacks->isEmpty())
                        <p>No feedback available.</p>
                    @endif
                </div>


                @else
                <div class="logo">🎉 Tutor2You 🎉</div>
                @endauth
            </div>
        </div>
    </div>
</body>
</html>


