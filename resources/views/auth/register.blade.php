<x-guest-layout>
    <!-- Angelic Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fdfbfb, #ebedee, #fdf6f9);
            color: #444;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        form {
            background: rgba(255, 255, 255, 0.95);
            padding: 3rem;
            border-radius: 2rem;
            box-shadow: 0 12px 30px rgba(200, 180, 255, 0.3);
            width: 100%;
            max-width: 540px;
            border: 2px solid #f0e6ff;
        }

        h2 {
            font-family: 'Great Vibes', cursive;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 2rem;
            color: #b076ff;
        }

        label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 600;
            color: #6c5ce7;
            font-size: 1.1rem;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 1rem;
            margin-bottom: 1.5rem;
            background-color: #f9f5ff;
            color: #444;
            border: 1px solid #d6c8f4;
            border-radius: 0.75rem;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            border-color: #b38aff;
            outline: none;
            box-shadow: 0 0 0 4px rgba(179, 138, 255, 0.2);
        }

        .error {
            color: #d64565;
            font-size: 0.9rem;
            margin-top: -1rem;
            margin-bottom: 1rem;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        .form-footer a {
            font-size: 1rem;
            color: #a78bfa;
            text-decoration: none;
        }

        .form-footer a:hover {
            color: #9c6eff;
            text-decoration: underline;
        }

        button {
            background: linear-gradient(to right, #dcb7ff, #a174ff);
            color: white;
            padding: 0.85rem 2rem;
            border: none;
            border-radius: 0.75rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
            box-shadow: 0 6px 18px rgba(177, 123, 255, 0.3);
        }

        button:hover {
            background: linear-gradient(to right, #cfa6ff, #9057ff);
            transform: scale(1.03);
        }
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2>Register now~</h2>

        <!-- Name -->
        <div>
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @if ($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Email -->
        <div>
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <!-- Password -->
        <div>
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @if ($errors->has('password_confirmation'))
                <div class="error">{{ $errors->first('password_confirmation') }}</div>
            @endif
        </div>

        <!-- Footer -->
        <div class="form-footer">
            <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
            <button type="submit">{{ __('Register') }}</button>
        </div>
    </form>
</x-guest-layout>
