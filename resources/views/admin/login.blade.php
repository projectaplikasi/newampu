<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AmpuStudio</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #85cbfa, #34173f);
        }

        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-weight: 600;
        }

        .input-box {
            position: relative;
            margin-bottom: 30px;
        }

        .input-box input {
            width: 100%;
            padding: 10px;
            background: none;
            color: #333;
            font-size: 16px;
            letter-spacing: 1px;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            color: #333;
            font-size: 16px;
            pointer-events: none;
            transition: 0.5s;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -5px;
            color: #9b59b6;
        }

        .input-box .underline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: #9b59b6;
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s ease-in-out;
        }

        .input-box input:focus~.underline {
            transform: scaleX(1);
            transform-origin: left;
        }

        .input-box input[type="submit"] {
            background: #9b59b6;
            color: white;
            font-size: 18px;
            letter-spacing: 2px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.5s ease;
        }

        .input-box input[type="submit"]:hover {
            background: #6d3a96;
        }

        /* Icon mata untuk melihat password */
        .input-box .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px;
            height: 20px;
            opacity: 0.6;
            transition: opacity 0.3s ease;
        }

        .input-box .eye-icon:hover {
            opacity: 1;
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <div class="container">
        <h2>Login to AmpuStudio</h2>
        <form action="/login" method="POST">
            @csrf
            <div class="input-box">
                <input type="text" name="username" required>
                <label for="username">Username</label>
                <div class="underline"></div>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
                <div class="underline"></div>
                <img src="https://img.icons8.com/ios-glyphs/30/000000/visible.png" alt="eye" class="eye-icon"
                    id="togglePassword">
            </div>
            <div class="input-box">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the icon
            this.src = type === 'password'
                ? 'https://img.icons8.com/ios-glyphs/30/000000/visible.png'
                : 'https://img.icons8.com/ios-glyphs/30/000000/invisible.png';
        });
    </script>

</body>

</html>