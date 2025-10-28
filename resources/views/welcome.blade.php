<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MalangVenue - Premium Event Space in the Heart of Malang</title>
    <meta name="description" content="Experience elegance at MalangVenue. Located at Jl. Doktor Sutomo No.202, Klojen, offering premium event spaces for meetings, conferences, and celebrations.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=playfair-display:400,500,600,700,800|inter:300,400,500,600,700&display=swap" rel="stylesheet" />

    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #8b7355;
            --accent: #d4af37;
            --light: #f8f9fa;
            --dark: #1a1a1a;
            --gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.8;
            color: var(--dark);
            overflow-x: hidden;
            background: var(--light);
        }

        ::selection {
            background: var(--accent);
            color: white;
        }

        /* Smooth fade-in animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1.25rem 0;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
            border-bottom: 1px solid rgba(212, 175, 55, 0.1);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            padding: 0.75rem 0;
            background: rgba(255, 255, 255, 0.95);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 1px;
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: '◆';
            color: var(--accent);
            font-size: 1rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            transition: left 0.5s ease;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(44, 62, 80, 0.3);
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            min-height: 90vh;
            padding: 8rem 2rem 4rem;
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.95) 0%, rgba(52, 73, 94, 0.95) 100%),
                        url('data:image/svg+xml,%3Csvg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 0h100v100H0z" fill="none"/%3E%3Cpath d="M25 25h50v50H25z" fill="rgba(255,255,255,0.02)"/%3E%3C/svg%3E');
            background-size: cover, 50px 50px;
            background-position: center;
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 30% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 50%);
            animation: float 8s ease-in-out infinite;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.15) 0%, transparent 70%);
            border-radius: 50%;
            animation: float 10s ease-in-out infinite reverse;
        }

        .hero-content {
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
            text-align: left;
            animation: fadeInUp 1s ease-out;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(212, 175, 55, 0.2);
            border: 1px solid var(--accent);
            color: var(--accent);
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 2rem;
            text-transform: uppercase;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .hero h1 .highlight {
            color: var(--accent);
            position: relative;
            display: inline-block;
        }

        .hero h1 .highlight::after {
            content: '';
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 12px;
            background: rgba(212, 175, 55, 0.3);
            z-index: -1;
        }

        .hero .subtitle {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .hero .location {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            margin-bottom: 3rem;
            opacity: 0.8;
        }

        .hero .location::before {
            content: '📍';
            font-size: 1.2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.3s, box-shadow 0.3s;
            display: inline-block;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.3);
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: -3rem auto 4rem;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
        }

        .stat-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: #6b7280;
            font-weight: 500;
            margin-top: 0.5rem;
        }

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            background: #f9fafb;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.125rem;
            color: #6b7280;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #1f2937;
        }

        .feature-card p {
            color: #6b7280;
            line-height: 1.7;
        }

        /* Room Types Section */
        .room-types {
            padding: 6rem 2rem;
        }

        .room-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .room-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .room-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
        }

        .room-image {
            height: 200px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }

        .room-content {
            padding: 1.5rem;
        }

        .room-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #1f2937;
        }

        .room-card p {
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .room-features {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .badge {
            background: #e0e7ff;
            color: #667eea;
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .room-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: #667eea;
        }

        .room-price span {
            font-size: 0.875rem;
            font-weight: 500;
            color: #6b7280;
        }

        /* CTA Section */
        .cta {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.95) 0%, rgba(52, 73, 94, 0.95) 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(212, 175, 55, 0.1) 0%, transparent 70%);
            animation: float 15s ease-in-out infinite;
        }

        .cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .cta p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        /* Gallery Section */
        .gallery {
            padding: 6rem 2rem;
            background: white;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
        }

        .gallery-item {
            position: relative;
            height: 300px;
            border-radius: 16px;
            overflow: hidden;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-item::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover::before {
            opacity: 0.6;
        }

        .gallery-item-content {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            color: white;
            z-index: 1;
        }

        .gallery-item h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .gallery-item p {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 6rem 2rem;
            background: var(--light);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .testimonial-card {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.12);
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            font-size: 4rem;
            font-family: 'Playfair Display', serif;
            color: var(--accent);
            opacity: 0.2;
            line-height: 1;
        }

        .testimonial-text {
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            color: var(--dark);
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .author-info h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.2rem;
        }

        .author-info p {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .rating {
            color: var(--accent);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            background: #1f2937;
            color: white;
            padding: 3rem 2rem 1rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #9ca3af;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #374151;
            color: #9ca3af;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .nav-links {
                display: none;
            }

            .section-title h2 {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <div class="nav-container">
            <div class="logo">MalangVenue</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#rooms">Venues</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#testimonials">Reviews</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <a href="/api/documentation" class="btn-primary">Book Now</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">✦ Premium Event Space ✦</div>
            <h1>Where <span class="highlight">Elegance</span> Meets Excellence</h1>
            <p class="subtitle">Experience unparalleled sophistication at MalangVenue, the premier destination for extraordinary events in the heart of Malang City.</p>
            <div class="location">Jl. Doktor Sutomo No.202, Klojen, Kota Malang, Jawa Timur 65111</div>
            <div class="hero-buttons">
                <a href="#rooms" class="btn-primary">Explore Venues</a>
                <a href="#contact" class="btn-secondary">Schedule Visit</a>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <div class="stats">
        <div class="stat-card">
            <div class="stat-number">30+</div>
            <div class="stat-label">Available Rooms</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">5</div>
            <div class="stat-label">Building Floors</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">200</div>
            <div class="stat-label">Max Capacity</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Support</div>
        </div>
    </div>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose BookVenue?</h2>
                <p>Everything you need for seamless venue booking experience</p>
            </div>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔐</div>
                    <h3>Secure Authentication</h3>
                    <p>Enterprise-grade security with Laravel Sanctum token-based authentication and role-based access control.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📅</div>
                    <h3>Real-time Availability</h3>
                    <p>Instant availability checking with automatic conflict detection to prevent double bookings.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Dynamic Pricing</h3>
                    <p>Flexible pricing with hourly and daily rates, automatically calculated based on booking duration.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3>Advanced Filtering</h3>
                    <p>Find your perfect venue with multi-criteria search by capacity, type, floor, and available facilities.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">✅</div>
                    <h3>Approval Workflow</h3>
                    <p>Streamlined booking process with admin approval system and comprehensive status tracking.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🚀</div>
                    <h3>RESTful API</h3>
                    <p>Modern API-first architecture with 20+ endpoints for seamless integration with any frontend.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Room Types Section -->
    <section id="rooms" class="room-types">
        <div class="container">
            <div class="section-title">
                <h2>Our Venue Collection</h2>
                <p>Discover the perfect space for your needs</p>
            </div>
            <div class="room-grid">
                <div class="room-card">
                    <div class="room-image">🏢</div>
                    <div class="room-content">
                        <h3>Meeting Rooms</h3>
                        <p>Perfect for team meetings and presentations</p>
                        <div class="room-features">
                            <span class="badge">20-40 pax</span>
                            <span class="badge">AC</span>
                            <span class="badge">Projector</span>
                            <span class="badge">WiFi</span>
                        </div>
                        <div class="room-price">Rp 50K <span>/hour</span></div>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">🎭</div>
                    <div class="room-content">
                        <h3>Event Halls</h3>
                        <p>Ideal for conferences and celebrations</p>
                        <div class="room-features">
                            <span class="badge">60-100 pax</span>
                            <span class="badge">AC</span>
                            <span class="badge">Sound System</span>
                            <span class="badge">WiFi</span>
                        </div>
                        <div class="room-price">Rp 100K <span>/hour</span></div>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">🎪</div>
                    <div class="room-content">
                        <h3>Auditoriums</h3>
                        <p>Large-scale events and seminars</p>
                        <div class="room-features">
                            <span class="badge">150-200 pax</span>
                            <span class="badge">AC</span>
                            <span class="badge">Full Audio</span>
                            <span class="badge">WiFi</span>
                        </div>
                        <div class="room-price">Rp 200K <span>/hour</span></div>
                    </div>
                </div>
                <div class="room-card">
                    <div class="room-image">🔬</div>
                    <div class="room-content">
                        <h3>Laboratory</h3>
                        <p>Training and workshop facilities</p>
                        <div class="room-features">
                            <span class="badge">20-40 pax</span>
                            <span class="badge">AC</span>
                            <span class="badge">Equipment</span>
                            <span class="badge">WiFi</span>
                        </div>
                        <div class="room-price">Rp 250K <span>/hour</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Host Your Perfect Event?</h2>
            <p>Let us help you create unforgettable moments at MalangVenue</p>
            <div class="hero-buttons">
                <a href="#contact" class="btn-secondary">Contact Us</a>
                <a href="/api/documentation" class="btn-primary">View Pricing</a>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery">
        <div class="container">
            <div class="section-title">
                <h2>Our Elegant Spaces</h2>
                <p>Discover the beauty and versatility of our venues</p>
            </div>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <div class="gallery-item-content">
                        <h3>Grand Ballroom</h3>
                        <p>Perfect for weddings and galas</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-item-content">
                        <h3>Executive Boardroom</h3>
                        <p>Ideal for corporate meetings</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-item-content">
                        <h3>Garden Terrace</h3>
                        <p>Open-air elegance</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <div class="gallery-item-content">
                        <h3>Conference Hall</h3>
                        <p>State-of-the-art facilities</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Clients Say</h2>
                <p>Trusted by hundreds of satisfied customers</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="rating">★★★★★</div>
                    <p class="testimonial-text">"MalangVenue exceeded all our expectations for our corporate annual meeting. The facilities are world-class and the staff was incredibly professional and attentive."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">AS</div>
                        <div class="author-info">
                            <h4>Andi Setiawan</h4>
                            <p>CEO, Tech Innovations Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="rating">★★★★★</div>
                    <p class="testimonial-text">"Our wedding at MalangVenue was absolutely magical! The elegant ambiance and exceptional service made our special day truly unforgettable."</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SP</div>
                        <div class="author-info">
                            <h4>Siti & Putra</h4>
                            <p>Wedding Couple</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="rating">★★★★★</div>
                    <p class="testimonial-text">"The perfect venue for our product launch. Modern facilities, strategic location, and impeccable service. Highly recommended for any corporate event!"</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">RW</div>
                        <div class="author-info">
                            <h4>Rini Wijaya</h4>
                            <p>Marketing Director, Startup Hub</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-content">
            <div class="footer-section">
                <h3>BookVenue</h3>
                <p>Premium venue booking system in Malang City. Your perfect space awaits.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#rooms">Rooms</a></li>
                    <li><a href="/api/documentation">API Documentation</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>API Endpoints</h3>
                <ul>
                    <li><a href="/api/rooms">/api/rooms</a></li>
                    <li><a href="/api/floors">/api/floors</a></li>
                    <li><a href="/api/login">/api/login</a></li>
                    <li><a href="/api/register">/api/register</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li>📍 Malang City, East Java</li>
                    <li>📧 info@bookvenue.test</li>
                    <li>📱 +62 xxx xxxx xxxx</li>
                    <li>🕐 24/7 Support</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 BookVenue. Built with Laravel 10 & PHP 8.1 | Portfolio Project</p>
        </div>
    </footer>
</body>
</html>
