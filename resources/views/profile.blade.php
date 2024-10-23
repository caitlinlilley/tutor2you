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
            border-color: #0047AB;
            outline: none;
        }

        .update-button {
            background-color: #0047AB;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .update-button:hover {
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

                <div class="profile-container">
                    <h2>My Profile</h2>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="/my-profile" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio" class="form-control">{{ old('bio', $user->bio) }}</textarea>
                            @error('bio')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="expertise">Course Expertise</label>
                            <input type="text" name="expertise" id="expertise" class="form-control" value="{{ old('expertise', $user->expertise) }}">
                            @error('expertise')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="availability">Availability</label>
                            <input type="text" name="availability" id="availability" class="form-control" value="{{ old('availability', $user->availability) }}">
                            @error('availability')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="pricing">Pricing</label>
                            <input type="text" name="pricing" id="pricing" class="form-control" value="{{ old('pricing', $user->pricing) }}">
                            @error('pricing')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="qualifications">Qualifications</label>
                            <input type="text" name="qualifications" id="qualifications" class="form-control" value="{{ old('qualifications', $user->qualifications) }}">
                            @error('qualifications')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="password">Password (leave blank to keep current password)</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>

                <div class="feedback-list">
                    <h2>View Your Feedback</h2>
                    @foreach ($feedbacks as $feedback)
                        <div class="feedback-item">
                            <p>{{ $feedback->content }}</p>
                            <small>
                                Submitted by: {{ $feedback->submittedBy ? $feedback->submittedBy->name : 'Unknown User' }} 
                                on {{ $feedback->created_at }}
                            </small>
                        </div>
                    @endforeach
                    @if ($feedbacks->isEmpty())
                        <p>No feedback available.</p>
                    @endif
                </div>

                

                @else


                @endauth
            </div>
        </div>
    </div>

</body>
</html>

