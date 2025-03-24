<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - HotelBooking</title>
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --background: #f9fafb;
            --card-bg: #ffffff;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --border-color: #e5e7eb;
            --logo-blue: #0066cc;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        body {
            background-color: var(--background);
            color: var(--text-primary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 460px;
            padding: 1.5rem;
        }
        
        .register-card {
            background-color: var(--card-bg);
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -5px rgba(0, 0, 0, 0.04);
            padding: 2rem;
        }
        
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--logo-blue);
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }
        
        .title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .subtitle {
            color: var(--text-secondary);
            font-size: 0.95rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
            font-size: 0.9rem;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
        
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        .password-requirements {
            font-size: 0.8rem;
            color: var(--text-secondary);
            margin-top: 0.5rem;
        }
        
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }
        
        .login-link {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s ease;
        }
        
        .login-link:hover {
            color: var(--primary-hover);
            text-decoration: underline;
        }
        
        .btn-register {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        
        .btn-register:hover {
            background-color: var(--primary-hover);
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        
        @media (max-width: 640px) {
            .container {
                padding: 1rem;
            }
            
            .register-card {
                padding: 1.5rem;
            }
            
            .footer {
                flex-direction: column-reverse;
                gap: 1rem;
            }
            
            .btn-register {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-card">
            <div class="header">
                <div class="logo">HotelBooking</div>
                <h1 class="title">Create an Account</h1>
                <p class="subtitle">Join our platform to get started</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password">
                    <div class="password-requirements">
                        Use at least 8 characters with letters, numbers, and symbols
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>
                
                <div class="footer">
                    <a class="login-link" href="{{ route('login') }}">
                        Already registered?
                    </a>
                    
                    <button type="submit" class="btn-register">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>