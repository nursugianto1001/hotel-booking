<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Password - HotelBooking</title>
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
            --success: #10b981;
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
            max-width: 420px;
            padding: 1.5rem;
        }
        
        .card {
            background-color: var(--card-bg);
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -5px rgba(0, 0, 0, 0.04);
            padding: 2rem;
        }
        
        .header {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--logo-blue);
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }
        
        .title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .notice {
            color: var(--text-secondary);
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
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
        
        input[type="password"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 0.5rem;
            font-size: 1rem;
            color: var(--text-primary);
            transition: all 0.2s ease;
        }
        
        input[type="password"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
        
        .btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        
        .btn:hover {
            background-color: var(--primary-hover);
        }
        
        .footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 1.5rem;
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
            
            .card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="logo">HotelBooking</div>
                <h1 class="title">Security Verification</h1>
            </div>
            
            <div class="notice">
                This is a secure area of the application. Please confirm your password before continuing.
            </div>
            
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
                
                <div class="footer">
                    <button type="submit" class="btn">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>