<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Business Botswana</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                background-color: #f3f4f6; /* Light gray background */
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            .container {
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                padding: 2rem;
                max-width: 400px;
                width: 100%;
                text-align: center;
            }

            .logo {
                width: 150px;
                height: auto;
                margin-bottom: 1rem;
            }

            .title {
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 1rem;
                color: #333333;
            }

            .links {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                margin-top: 2rem;
            }

            .link {
                display: block;
                padding: 0.75rem;
                background-color: #4f46e5; /* Indigo background */
                color: white;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .link:hover {
                background-color: #4338ca; /* Darker indigo */
            }

            /* Footer Styles */
            footer {
                width: 100%;
                background-color: #333333; /* Dark gray background */
                color: #9ca3af; /* Grayish text color */
                padding: 2rem 0;
                text-align: center;
                margin-top: auto; /* Push footer to bottom */
            }

            .footer-container {
                max-width: 1200px;
                margin: 0 auto;
                display: flex;
                justify-content: space-around;
                flex-wrap: wrap;
                gap: 2rem;
            }

            .footer-column {
                flex: 1;
                min-width: 200px;
            }

            .footer-column h3 {
                color: #00adb5; /* Light blue color for headers */
                margin-bottom: 1rem;
                font-size: 1.2rem;
            }

            .social-icons {
                display: flex;
                justify-content: center;
                gap: 1rem;
                margin-bottom: 1rem;
            }

            .social-icons a {
                color: white;
                font-size: 1.5rem;
            }

            .footer-info {
                margin-top: 1rem;
                color: #9ca3af;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <!-- BB Logo -->
            <img src="https://www.bb.org.bw/images/logo.png" alt="BB Logo" class="logo">
            <h1 class="title">Welcome to FileStorage Application</h1>
            <div class="links">
                <!-- Login and Register links -->
                <a href="{{ route('login') }}" class="link">Login</a>
                <a href="{{ route('register') }}" class="link">Register</a>
            </div>
        </div>
            <br>
        <!-- Footer -->
        <footer>
            <div class="footer-container">
                <!-- Connect with Us Section -->
                <div class="footer-column">
                    <h3>Connect with us</h3>
                    <div class="social-icons">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="footer-info">
                        Copyright © 2024. All Rights Reserved<br>
                        Designed & Developed by Kabelo Nkaki.
                    </div>
                </div>

                <!-- Contacts Section -->
                <div class="footer-column">
                    <h3>Contacts</h3>
                    <p><strong>Head Office</strong><br>
                    Business Botswana (former BOCCIM) House<br>
                    Luthuli Road<br>
                    P.O. Box 432<br>
                    Gaborone, Botswana<br>
                    Phone: (+267) 3953459<br>
                    Fax: (+267) 3973142</p>
                </div>

                <!-- North Region Section -->
                <div class="footer-column">
                    <h3>North Region</h3>
                    <p>Haskins Building<br>
                    Private Bag F/85<br>
                    Francistown<br>
                    Phone: (+267) 2414622<br>
                    Fax: (+267) 2414494</p>
                </div>
            </div>
        </footer>
    </body>
</html>
