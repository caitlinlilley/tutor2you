<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
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
            margin: 40px auto;
            padding: 20px;
        }

        h2 {
            color: #333;
            border-bottom: 3px solid #ff6f61;
            padding-bottom: 10px;
            font-size: 24px;
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

        input[type="text"], textarea {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #ff6f61;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, textarea:focus {
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
        <div class="logo">🎉 Tutor2You 🎉</div>

        <div class="form-container">
            <h2>Edit Post</h2>
            <form action="/edit-post/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{$post->title}}" placeholder="Course ID">
                <textarea name="body" placeholder="Qualifications, experience etc.">{{$post->body}}</textarea>
                <textarea name="contact" placeholder="Contact Details">{{$post->contact}}</textarea>
                <button>Save Changes</button>
            </form>
        </div>
    </div>

</body>
</html>
