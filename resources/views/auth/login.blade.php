<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MalangVenue</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:300,400,500,600,700|raleway:200,300,400,500,600,700,800" rel="stylesheet" />
    <style>
        :root {
            --primary-dark: #0a0e27;
            --primary-navy: #162447;
            --accent-gold: #c9a961;
            --light-cream: #f5f1e8;
            --pure-white: #ffffff;
            --error-red: #dc2626;
            --success-green: #16a34a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Raleway', sans-serif;
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-navy) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            max-width: 480px;
            width: 100%;
            background: var(--pure-white);
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .login-header {
            background: var(--primary-dark);
            color: var(--pure-white);
            padding: 3rem 2rem 2rem;
            text-align: center;
        }

        .login-header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--accent-gold);
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        .login-body {
            padding: 2.5rem 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--primary-dark);
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
            font-family: 'Raleway', sans-serif;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-gold);
            box-shadow: 0 0 0 3px rgba(201, 169, 97, 0.1);
        }

        .form-input.error {
            border-color: var(--error-red);
        }

        .error-message {
            color: var(--error-red);
            font-size: 0.875rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .success-message {
            background: #d1fae5;
            color: var(--success-green);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .form-checkbox {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .form-checkbox input {
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .form-checkbox label {
            font-size: 0.9rem;
            color: #6b7280;
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, var(--accent-gold) 0%, #be9981 100%);
            color: var(--primary-dark);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(201, 169, 97, 0.3);
        }

        .login-footer {
            text-align: center;
            padding: 0 2rem 2.5rem;
            color: #6b7280;
            font-size: 0.9rem;
        }

        .login-footer a {
            color: var(--accent-gold);
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-home {
            display: inline-block;
            margin-bottom: 2rem;
            color: var(--accent-gold);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .back-home:hover {
            transform: translateX(-5px);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>MalangVenue</h1>
            <p>Login to your account</p>
        </div>

        <div class="login-body">
            <a href="/" class="back-home">← Back to Home</a>

            @if(session('success'))
                <div class="success-message">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-input @error('email') error @enderror" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        placeholder="your@email.com"
                    >
                    @error('email')
                        <div class="error-message">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-input @error('password') error @enderror" 
                        required
                        placeholder="Enter your password"
                    >
                    @error('password')
                        <div class="error-message">⚠ {{ $message }}</div>
                    @enderror
                </div>

                <div class="form-checkbox">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Remember me</label>
                </div>

                <button type="submit" class="btn-primary">
                    Login
                </button>
            </form>
        </div>

        <div class="login-footer">
            Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
        </div>
    </div>
</body>
</html>
