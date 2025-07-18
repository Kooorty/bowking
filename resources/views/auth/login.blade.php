<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #fefaff, #f8f0ff, #fff7fb);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #444;
    }

    .login-container {
      background: rgba(255, 255, 255, 0.96);
      padding: 3rem;
      max-width: 480px;
      width: 100%;
      border-radius: 2rem;
      border: 2px solid #eee0ff;
      box-shadow: 0 10px 25px rgba(190, 160, 255, 0.25);
    }

    h2 {
      font-family: 'Great Vibes', cursive;
      text-align: center;
      font-size: 2.8rem;
      margin-bottom: 0.5rem;
      color: #b179ff;
    }

    .description {
      text-align: center;
      font-size: 1rem;
      color: #997acc;
      margin-bottom: 2rem;
    }

    label {
      font-size: 1rem;
      display: block;
      margin-bottom: 0.4rem;
      color: #7c5de0;
      font-weight: 600;
    }

    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 1rem;
      border-radius: 0.75rem;
      background-color: #f9f4ff;
      border: 1px solid #d9c6f4;
      color: #333;
      font-size: 1rem;
      margin-bottom: 1.25rem;
      transition: all 0.3s ease;
    }

    input:focus {
      border-color: #b38aff;
      outline: none;
      box-shadow: 0 0 0 4px rgba(179, 138, 255, 0.2);
    }

    .checkbox-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 0.95rem;
      color: #7a6a9a;
      margin-bottom: 1.5rem;
    }

    .checkbox-container input {
      margin-right: 6px;
    }

    .checkbox-container a {
      color: #a774ff;
      text-decoration: none;
      font-weight: 500;
    }

    .checkbox-container a:hover {
      text-decoration: underline;
    }

    .submit-btn {
      width: 100%;
      padding: 0.9rem;
      border: none;
      border-radius: 0.8rem;
      font-size: 1.1rem;
      font-weight: bold;
      background: linear-gradient(to right, #d8b6ff, #9d6bff);
      color: white;
      cursor: pointer;
      transition: background 0.3s ease, transform 0.2s ease;
      box-shadow: 0 8px 16px rgba(177, 123, 255, 0.3);
    }

    .submit-btn:hover {
      background: linear-gradient(to right, #c69aff, #844dff);
      transform: scale(1.03);
    }

    .footer-text {
      text-align: center;
      margin-top: 1.5rem;
      font-size: 0.95rem;
      color: #8b7ea8;
    }

    .footer-text a {
      color: #a774ff;
      font-weight: 600;
      text-decoration: none;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    .session-status, .error-message {
      font-size: 0.95rem;
      text-align: center;
      margin-bottom: 1rem;
    }

    .session-status {
      color: #44aaff;
    }

    .error-message {
      color: #ff4b7d;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <h2>Welcome Back</h2>
    <p class="description">Please enter your credentials to sign in</p>

    <!-- Session Status -->
    @if (session('status'))
      <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com">
      @error('email')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required placeholder="••••••••">
      @error('password')
        <div class="error-message">{{ $message }}</div>
      @enderror

      <div class="checkbox-container">
        <label><input type="checkbox" name="remember"> Remember me</label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}">Forgot password?</a>
        @endif
      </div>

      <button type="submit" class="submit-btn">Log In</button>
    </form>

    <p class="footer-text">
      Don’t have an account?
      <a href="{{ route('register') }}">Sign up</a>
    </p>
  </div>

</body>
</html>
