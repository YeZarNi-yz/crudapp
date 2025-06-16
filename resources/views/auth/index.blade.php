<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      /* background: linear-gradient(135deg, #6e8efb, #a777e3); */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-box h2 {
      text-align: center;
      margin-bottom: 24px;
      color: #333;
    }

    .login-box label {
      display: block;
      margin-bottom: 8px;
      font-weight: 600;
      color: #444;
    }

    .login-box input[type="email"],
    .login-box input[type="password"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      margin-bottom: 20px;
      box-sizing: border-box;
      font-size: 16px;
    }

    .login-box input[type="submit"] {
      width: 100%;
      padding: 12px;
      background-color: #6e8efb;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .login-box input[type="submit"]:hover {
      background-color: #5a7df0;
    }

    .login-box .bottom-text {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
      color: #666;
    }

    .login-box .bottom-text a {
      color: #6e8efb;
      text-decoration: none;
    }

    .login-box .bottom-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <div class="login-box">
    <h2>Login</h2>
    <form action="/login" method="POST">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />

      <input type="submit" value="Sign In" />
    </form>
    <div class="bottom-text">
      Don't have an account? <a href="/register">Register</a>
    </div>
  </div>

</body>

</html>