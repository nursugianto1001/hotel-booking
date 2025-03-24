<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - HotelBooking</title>
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
            max-width: 500px;
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
        
        .status-message {
            background-color: rgba(16, 185, 129, 0.1);
            border-left: 4px solid var(--success);
            padding: 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
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
        
        .btn-secondary {
            background-color: transparent;
            color: var(--text-secondary);
            border: none;
            padding: 0.75rem 0;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: color 0.2s ease;
            text-decoration: underline;
        }
        
        .btn-secondary:hover {
            color: var(--text-primary);
        }
        
        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        
        .verification-image {
            display: block;
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
        }
        
        @media (max-width: 640px) {
            .container {
                padding: 1rem;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            .footer {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="header">
                <div class="logo">HotelBooking</div>
                <svg class="verification-image" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="12" cy="12" r="11" stroke="#0066cc" stroke-width="2"/>
                    <path d="M8 12L11 15L16 9" stroke="#0066cc" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <h1 class="title">Verify Your Email Address</h1>
            </div>
            
            <div class="notice">
                Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>
            
            @if (session('status') == 'verification-link-sent')
                <div class="status-message">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif
            
            <div class="footer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-secondary">
                        Log Out
                    </button>
                </form>
                
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn">
                        Resend Verification Email
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>