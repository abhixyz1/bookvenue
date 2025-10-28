<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MalangVenue — Elite Venue & Event Space in Malang</title>
    <meta name="description" content="Book premium event spaces in the heart of Malang. Modern venues for your most important events.">
    <meta name="keywords" content="venue malang, event space malang, wedding venue, corporate venue, malang venue booking">    <meta name="author" content="MalangVenue">
    <meta name="theme-color" content="#0f172a">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="MalangVenue — Elite Venue & Event Space in Malang">
    <meta property="og:description" content="Book premium event spaces in the heart of Malang. Modern venues for your most important events.">
    <meta property="og:image" content="{{ url('/') }}/og-image.jpg">
    <meta property="og:site_name" content="MalangVenue">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="MalangVenue — Elite Venue & Event Space in Malang">
    <meta name="twitter:description" content="Book premium event spaces in the heart of Malang. Modern venues for your most important events.">
    <meta name="twitter:image" content="{{ url('/') }}/og-image.jpg">
    <meta name="twitter:site" content="@malangvenue">

    <!-- Performance Optimizations -->
    <link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700|playfair-display:600,700&display=swap" rel="stylesheet" />

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EventVenue",
        "name": "MalangVenue",
        "description": "Premium event spaces in the heart of Malang. Modern venues for your most important events.",
        "url": "{{ url('/') }}",
        "telephone": "+62-341-555-666",
        "email": "hello@malangvenue.id",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Doktor Sutomo No.202",
            "addressLocality": "Klojen",
            "addressRegion": "Malang",
            "postalCode": "65111",
            "addressCountry": "ID"
        },
        "priceRange": "50000-250000",
        "paymentAccepted": "Cash, Credit Card, Bank Transfer",
        "currenciesAccepted": "IDR"
    }
    </script>

    <style>
        /* Optimized Design System */
        :root {
            --primary: #0f172a;
            --accent: #d4af37;
            --cream: #fafaf9;
            --white: #ffffff;
            --gray: #64748b;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
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
            background: var(--cream);
            color: var(--primary);
            line-height: 1.6;
            overflow-x: hidden;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        body.loaded {
            opacity: 1;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            line-height: 1.2;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            padding: 1.25rem 0;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow);
            padding: 0.875rem 0;
        }

        .navbar-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.2s ease;
        }

        .nav-link:hover {
            color: var(--accent);
        }

        .nav-link:hover::after,
        .nav-link:focus-visible::after {
            width: 100%;
        }

        .nav-auth {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        /* Enhanced CTA buttons - More prominent */
        .nav-auth {
            gap: 1rem;
        }

        .nav-auth .btn-outline {
            border: 2px solid var(--primary);
            background: transparent;
            color: var(--primary);
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .nav-auth .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.3);
        }

        .nav-auth .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, #b8941f 100%);
            border: 2px solid var(--accent);
            color: var(--primary);
            font-weight: 700;
            font-size: 0.9rem;
            padding: 0.875rem 2rem;
            box-shadow: 0 4px 16px rgba(212, 175, 55, 0.4);
            position: relative;
            overflow: hidden;
        }

        .nav-auth .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #f4d03f 0%, var(--accent) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav-auth .btn-primary:hover::before {
            opacity: 1;
        }

        .nav-auth .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.5);
        }

        .nav-auth .btn-primary span {
            position: relative;
            z-index: 1;
        }

        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            z-index: 1001;
        }

        .mobile-menu-toggle span {
            width: 25px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .mobile-menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        .mobile-menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        .mobile-menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--white);
            z-index: 1000;
            padding: 5rem 2rem 2rem;
            overflow-y: auto;
        }

        .mobile-menu.active {
            display: block;
        }

        .mobile-menu-links {
            list-style: none;
            margin-bottom: 2rem;
        }

        .mobile-menu-links li {
            margin-bottom: 1.5rem;
        }

        .mobile-menu-links a {
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
            font-size: 1.25rem;
            display: block;
        }

        .mobile-menu-auth {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            font-size: 0.875rem;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid transparent;
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: transparent;
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-outline {
            background: transparent;
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: var(--white);
            transform: translateY(-2px);
        }

        .btn-gold {
            background: linear-gradient(135deg, var(--accent) 0%, #f4d03f 100%);
            color: var(--primary);
            border: 2px solid var(--accent);
            font-weight: 700;
            padding: 1rem 2.5rem;
            font-size: 1rem;
            box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-gold::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #f7dc6f 0%, var(--accent) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-gold:hover::before {
            opacity: 1;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(212, 175, 55, 0.5);
        }

        .btn-gold span {
            position: relative;
            z-index: 1;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: var(--primary);
            display: flex;
            align-items: center;
            padding: 6rem 0 4rem;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 70% 30%, rgba(212, 175, 55, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .hero-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 2;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-badge {
            display: inline-block;
            padding: 0.5rem 1.25rem;
            background: rgba(212, 175, 55, 0.15);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 50px;
            color: var(--accent);
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-size: 4rem;
            color: var(--white);
            margin-bottom: 1.5rem;
        }

        .hero h1 .highlight {
            color: var(--accent);
        }

        .hero .lead {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 1rem;
            line-height: 1.7;
        }

        .hero .location {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 2.5rem;
        }

        .hero-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-image-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }

        .hero-image {
            aspect-ratio: 1;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            border-radius: 12px;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image-icon {
            font-size: 3rem;
            opacity: 0.4;
        }

        .hero-image-label {
            position: absolute;
            bottom: 1.25rem;
            left: 1.25rem;
            color: var(--white);
            font-weight: 600;
            font-size: 1.1rem;
        }

        /* Stats Bar */
        .stats-bar {
            background: var(--white);
            padding: 2.5rem 0;
            box-shadow: var(--shadow);
        }

        .stats-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 0.875rem;
            color: var(--gray);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Sections */
        .section {
            padding: 6rem 0;
        }

        .section-dark {
            background: var(--primary);
            color: var(--white);
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .section-subtitle {
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: 2.75rem;
            margin-bottom: 1.25rem;
        }

        .section-description {
            font-size: 1.125rem;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
        }

        /* Features Grid */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            content-visibility: auto;
            contain-intrinsic-size: 800px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 2.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(212, 175, 55, 0.3);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: var(--accent);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .feature-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.7;
        }

        /* Venues Showcase */
        .venues-showcase {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            content-visibility: auto;
            contain-intrinsic-size: 800px;
        }

        .venue-card {
            background: var(--white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .venue-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .venue-card:nth-child(1) {
            grid-row: span 2;
        }

        .venue-image-container {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16/10;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .venue-card:nth-child(1) .venue-image-container {
            aspect-ratio: 1;
        }

        .venue-image-icon {
            font-size: 4rem;
            opacity: 0.3;
        }

        .venue-tag {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: var(--accent);
            color: var(--primary);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .venue-content {
            padding: 2rem;
        }

        .venue-title {
            font-size: 1.5rem;
            margin-bottom: 0.75rem;
            color: var(--primary);
        }

        .venue-description {
            color: var(--gray);
            margin-bottom: 1.25rem;
            line-height: 1.6;
        }

        .venue-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.25rem;
        }

        .venue-feature-badge {
            padding: 0.35rem 0.875rem;
            background: var(--cream);
            color: var(--primary);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .venue-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1.25rem;
            border-top: 1px solid #e5e7eb;
        }

        .venue-capacity {
            font-size: 0.875rem;
            color: var(--gray);
            font-weight: 500;
        }

        .venue-price {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--accent);
        }

        .venue-price-period {
            font-size: 0.875rem;
            color: var(--gray);
        }

        /* CTA Section */
        .cta-section {
            background: var(--accent);
            color: var(--primary);
        }

        .cta-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 3rem;
            margin-bottom: 1.25rem;
        }

        .cta-description {
            font-size: 1.25rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        /* Testimonials */
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            content-visibility: auto;
            contain-intrinsic-size: 800px;
        }

        .testimonial-card {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }

        .testimonial-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .testimonial-rating {
            color: var(--accent);
            font-size: 1.1rem;
            margin-bottom: 1.25rem;
        }

        .testimonial-text {
            font-size: 1rem;
            line-height: 1.7;
            color: var(--primary);
            margin-bottom: 1.75rem;
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
            background: var(--accent);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--primary);
        }

        .author-info h4 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .author-info p {
            font-size: 0.875rem;
            color: var(--gray);
        }

        /* Footer */
        .footer {
            background: var(--primary);
            color: rgba(255, 255, 255, 0.8);
            padding: 4rem 0 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 1.25rem;
        }

        .footer-description {
            line-height: 1.7;
            margin-bottom: 1.25rem;
        }

        .footer-social {
            display: flex;
            gap: 0.75rem;
        }

        .social-icon {
            width: 36px;
            height: 36px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .footer-column h3 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--white);
            margin-bottom: 1.25rem;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.625rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }

        .footer-links a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.875rem;
        }

        /* Mobile Responsive */
        @media (max-width: 1024px) {
            .navbar-container {
                padding: 0 1.5rem;
            }
            .hero h1 {
                font-size: 3rem;
            }
            .section-title {
                font-size: 2.25rem;
            }
            .section {
                padding: 4rem 0;
            }
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .nav-menu,
            .nav-auth {
                display: none;
            }
            .mobile-menu-toggle {
                display: flex;
            }
            .navbar-container {
                padding: 0 1rem;
            }
            .hero {
                padding: 5rem 0 3rem;
            }
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
            .hero .lead {
                font-size: 1.125rem;
            }
            .hero-badge {
                margin-bottom: 1.5rem;
            }
            .hero-actions {
                justify-content: center;
            }
            .stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 1.5rem;
            }
            .stat-number {
                font-size: 2rem;
            }
            .section {
                padding: 3rem 0;
            }
            .section-header {
                margin-bottom: 2.5rem;
            }
            .section-title {
                font-size: 2rem;
            }
            .features-grid,
            .venues-showcase,
            .testimonials-grid,
            .footer-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            .feature-card,
            .venue-card,
            .testimonial-card {
                padding: 2rem;
            }
            .venue-card:nth-child(1) {
                grid-row: auto;
            }
            .cta-title {
                font-size: 2rem;
            }
            .cta-description {
                font-size: 1.125rem;
            }
            .container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }
            .btn {
                padding: 0.625rem 1.5rem;
                font-size: 0.813rem;
            }
            .stats-container {
                grid-template-columns: 1fr;
            }
            .hero-image-grid {
                gap: 1rem;
            }
        }

        /* Accessibility and Focus Styles */
        .skip-link { position: absolute; left: -999px; top: auto; width: 1px; height: 1px; overflow: hidden; }
        .skip-link:focus { left: 1rem; top: 1rem; width: auto; height: auto; background: var(--white); color: var(--primary); border: 2px solid var(--primary); padding: 0.5rem 1rem; border-radius: 6px; z-index: 1002; }
        :focus-visible { outline: 3px solid var(--accent); outline-offset: 2px; }

        /* Animate on reveal only (better performance) */
        .reveal { opacity: 0; transform: translateY(16px); }
        .reveal.visible { opacity: 1; transform: translateY(0); transition: opacity .5s ease, transform .5s ease; }
        @media (prefers-reduced-motion: reduce) {
            * { animation: none !important; transition: none !important; scroll-behavior: auto !important; }
            .reveal, .reveal.visible { transform: none !important; opacity: 1 !important; }
        }

        /* Performance Optimizations */
        .features-grid, .venues-showcase, .testimonials-grid {
            content-visibility: auto;
            contain-intrinsic-size: 800px;
        }

        /* Critical above-the-fold optimizations */
        .btn, .nav-link, .feature-card, .venue-card, .testimonial-card {
            will-change: transform;
        }

        .hero-actions .btn {
            will-change: transform;
        }

        .stat-number {
            min-height: 3rem;
        }

        /* Reduced motion accessibility */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }

            .reveal, .reveal.visible {
                transform: none !important;
                opacity: 1 !important;
            }
        }

    </style>
</head>
<body>
    <a href="#main" class="skip-link">Skip to content</a>
    <!-- Navigation -->
    <nav class="navbar" id="navbar" role="navigation" aria-label="Main Navigation">
        <div class="navbar-container">
            <a href="/" class="brand">MalangVenue</a>
            <ul class="nav-menu">
                <li><a href="#features" class="nav-link">Features</a></li>
                <li><a href="#venues" class="nav-link">Venues</a></li>
                <li><a href="#testimonials" class="nav-link">Reviews</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            <div class="nav-auth">
                <a href="/login" class="btn btn-outline">Login</a>
                <a href="/register" class="btn btn-primary"><span>Sign Up</span></a>
            </div>
            <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Toggle menu" aria-controls="mobileMenu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu" aria-hidden="true">
        <ul class="mobile-menu-links">
            <li><a href="#features" class="mobile-menu-link">Features</a></li>
            <li><a href="#venues" class="mobile-menu-link">Venues</a></li>
            <li><a href="#testimonials" class="mobile-menu-link">Reviews</a></li>
            <li><a href="#contact" class="mobile-menu-link">Contact</a></li>
        </ul>
        <div class="mobile-menu-auth">
            <a href="/login" class="btn btn-outline" style="width: 100%; text-align: center;">Login</a>
            <a href="/register" class="btn btn-gold" style="width: 100%; text-align: center;"><span>Sign Up</span></a>
        </div>
    </div>

    <main id="main">
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-container">
                <div class="hero-content">
                    <div class="hero-badge">Elite Event Spaces</div>
                    <h1>Redefine <span class="highlight">Luxury</span><br>in Every Moment</h1>
                    <p class="lead">Experience premium event spaces in the heart of Malang. Where sophistication meets modern facilities.</p>
                    <div class="location">📍 Jl. Doktor Sutomo No.202, Klojen, Kota Malang</div>
                    <div class="hero-actions">
                        <a href="/register" class="btn btn-gold"><span>Book Now</span></a>
                        <a href="#venues" class="btn btn-outline">Explore Venues</a>
                    </div>
                </div>
                <div class="hero-visual">
                    <div class="hero-image-grid">
                        <div class="hero-image">
                            <div class="hero-image-icon">🏛️</div>
                            <div class="hero-image-label">Grand Hall</div>
                        </div>
                        <div class="hero-image">
                            <div class="hero-image-icon">💼</div>
                            <div class="hero-image-label">Executive</div>
                        </div>
                        <div class="hero-image">
                            <div class="hero-image-icon">🎪</div>
                            <div class="hero-image-label">Auditorium</div>
                        </div>
                        <div class="hero-image">
                            <div class="hero-image-icon">🔬</div>
                            <div class="hero-image-label">Laboratory</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Bar -->
        <div class="stats-bar">
            <div class="stats-container">
                <div class="stat-item">
                    <div class="stat-number">30+</div>
                    <div class="stat-label">Premium Venues</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Floors</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">200</div>
                    <div class="stat-label">Max Capacity</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Concierge</div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <section id="features" class="section section-dark">
            <div class="container">
                <div class="section-header">
                    <div class="section-subtitle">Why MalangVenue</div>
                    <h2 class="section-title">Premium Features</h2>
                    <p class="section-description">Everything you need for a successful event, all in one place.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card reveal">
                        <div class="feature-icon">🔐</div>
                        <h3 class="feature-title">Secure Booking</h3>
                        <p class="feature-description">Enterprise-grade security with Laravel Sanctum authentication and role-based access control.</p>
                    </div>
                    <div class="feature-card reveal">
                        <div class="feature-icon">⚡</div>
                        <h3 class="feature-title">Real-time Availability</h3>
                        <p class="feature-description">Instant booking confirmation with intelligent conflict detection system.</p>
                    </div>
                    <div class="feature-card reveal">
                        <div class="feature-icon">💎</div>
                        <h3 class="feature-title">Flexible Pricing</h3>
                        <p class="feature-description">Transparent pricing with hourly and daily rates automatically calculated.</p>
                    </div>
                    <div class="feature-card reveal">
                        <div class="feature-icon">🎯</div>
                        <h3 class="feature-title">Smart Search</h3>
                        <p class="feature-description">Advanced filtering by capacity, type, floor, and facilities to find your perfect venue.</p>
                    </div>
                    <div class="feature-card reveal">
                        <div class="feature-icon">✨</div>
                        <h3 class="feature-title">Easy Management</h3>
                        <p class="feature-description">Streamlined approval workflow with comprehensive status tracking.</p>
                    </div>
                    <div class="feature-card reveal">
                        <div class="feature-icon">🚀</div>
                        <h3 class="feature-title">RESTful API</h3>
                        <p class="feature-description">Modern API-first architecture with 20+ endpoints for seamless integration.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Venues Showcase -->
        <section id="venues" class="section">
            <div class="container">
                <div class="section-header">
                    <div class="section-subtitle">Our Collection</div>
                    <h2 class="section-title" style="color: var(--primary);">Exceptional Spaces</h2>
                    <p class="section-description" style="color: var(--gray);">Discover venues designed for your most important events.</p>
                </div>
                <div class="venues-showcase">
                    <div class="venue-card reveal">
                        <div class="venue-image-container">
                            <div class="venue-image-icon">🎭</div>
                            <div class="venue-tag">Popular</div>
                        </div>
                        <div class="venue-content">
                            <h3 class="venue-title">Grand Event Hall</h3>
                            <p class="venue-description">Magnificent ballroom with state-of-the-art audiovisual systems. Perfect for galas, conferences, and large celebrations.</p>
                            <div class="venue-features">
                                <span class="venue-feature-badge">AC Premium</span>
                                <span class="venue-feature-badge">Sound System</span>
                                <span class="venue-feature-badge">Projector 4K</span>
                                <span class="venue-feature-badge">WiFi Gigabit</span>
                                <span class="venue-feature-badge">Catering</span>
                            </div>
                            <div class="venue-footer">
                                <div class="venue-capacity">👥 60-100 guests</div>
                                <div>
                                    <span class="venue-price">100K</span>
                                    <span class="venue-price-period">/hour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="venue-card reveal">
                        <div class="venue-image-container">
                            <div class="venue-image-icon">💼</div>
                        </div>
                        <div class="venue-content">
                            <h3 class="venue-title">Executive Boardroom</h3>
                            <p class="venue-description">Premium meeting space with modern furnishings and cutting-edge technology.</p>
                            <div class="venue-features">
                                <span class="venue-feature-badge">AC</span>
                                <span class="venue-feature-badge">Projector</span>
                                <span class="venue-feature-badge">WiFi</span>
                            </div>
                            <div class="venue-footer">
                                <div class="venue-capacity">👥 20-40 guests</div>
                                <div>
                                    <span class="venue-price">50K</span>
                                    <span class="venue-price-period">/hour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="venue-card reveal">
                        <div class="venue-image-container">
                            <div class="venue-image-icon">🎪</div>
                            <div class="venue-tag">Premium</div>
                        </div>
                        <div class="venue-content">
                            <h3 class="venue-title">Grand Auditorium</h3>
                            <p class="venue-description">Theater-style venue with professional stage lighting for large events and seminars.</p>
                            <div class="venue-features">
                                <span class="venue-feature-badge">Full Audio</span>
                                <span class="venue-feature-badge">Stage Light</span>
                                <span class="venue-feature-badge">WiFi</span>
                            </div>
                            <div class="venue-footer">
                                <div class="venue-capacity">👥 150-200 guests</div>
                                <div>
                                    <span class="venue-price">200K</span>
                                    <span class="venue-price-period">/hour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="venue-card reveal">
                        <div class="venue-image-container">
                            <div class="venue-image-icon">🔬</div>
                        </div>
                        <div class="venue-content">
                            <h3 class="venue-title">Training Laboratory</h3>
                            <p class="venue-description">Fully equipped facility for workshops, training sessions, and hands-on programs.</p>
                            <div class="venue-features">
                                <span class="venue-feature-badge">Equipment</span>
                                <span class="venue-feature-badge">AC</span>
                                <span class="venue-feature-badge">WiFi</span>
                            </div>
                            <div class="venue-footer">
                                <div class="venue-capacity">👥 20-40 guests</div>
                                <div>
                                    <span class="venue-price">250K</span>
                                    <span class="venue-price-period">/hour</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="section cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title">Ready to Book Your Perfect Venue?</h2>
                    <p class="cta-description">Join hundreds of satisfied clients who trust MalangVenue for their most important events.</p>
                    <div class="hero-actions">
                        <a href="/register" class="btn btn-primary" style="background: var(--primary); color: var(--accent); border-color: var(--primary); font-weight: 700;"><span>Get Started</span></a>
                        <a href="/api/documentation" class="btn btn-outline" style="border-color: var(--primary); color: var(--primary);">View API Docs</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section id="testimonials" class="section">
            <div class="container">
                <div class="section-header">
                    <div class="section-subtitle">Testimonials</div>
                    <h2 class="section-title" style="color: var(--primary);">Trusted by Leaders</h2>
                    <p class="section-description" style="color: var(--gray);">See what our clients say about their experience.</p>
                </div>
                <div class="testimonials-grid">
                    <div class="testimonial-card reveal">
                        <div class="testimonial-rating">★★★★★</div>
                        <p class="testimonial-text">"MalangVenue transformed our corporate summit. The facilities and service exceeded all expectations. Highly recommended!"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">AS</div>
                            <div class="author-info">
                                <h4>Andi Setiawan</h4>
                                <p>CEO, Tech Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card reveal">
                        <div class="testimonial-rating">★★★★★</div>
                        <p class="testimonial-text">"Perfect venue for our wedding. The elegant ambiance and attentive staff made our day absolutely magical."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">SP</div>
                            <div class="author-info">
                                <h4>Siti & Putra</h4>
                                <p>Wedding, May 2024</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card reveal">
                        <div class="testimonial-rating">★★★★★</div>
                        <p class="testimonial-text">"The seamless booking process and modern facilities made our product launch a huge success."</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">RW</div>
                            <div class="author-info">
                                <h4>Rini Wijaya</h4>
                                <p>Marketing Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">MalangVenue</div>
                    <p class="footer-description">Premium event spaces in Malang City. Where sophistication meets innovation.</p>
                    <div class="footer-social">
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">𝕏</a>
                        <a href="#" class="social-icon">in</a>
                        <a href="#" class="social-icon">ig</a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3>Explore</h3>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#venues">Venues</a></li>
                        <li><a href="#testimonials">Reviews</a></li>
                        <li><a href="/api/documentation">API Docs</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>API Access</h3>
                    <ul class="footer-links">
                        <li><a href="/api/rooms">Rooms API</a></li>
                        <li><a href="/api/floors">Floors API</a></li>
                        <li><a href="/login">Login</a></li>
                        <li><a href="/register">Register</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact</h3>
                    <ul class="footer-links">
                        <li><a href="#">Jl. Doktor Sutomo 202</a></li>
                        <li><a href="#">Klojen, Malang 65111</a></li>
                        <li><a href="mailto:hello@malangvenue.id">hello@malangvenue.id</a></li>
                        <li><a href="tel:+62341555666">+62 341 555 666</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2024 MalangVenue — Built with Laravel 10 & PHP 8.1 | Premium Portfolio Project</p>
            </div>
        </div>
    </footer>

    <!-- Optimized JavaScript -->
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        let lastScroll = 0;

        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;
            navbar.classList.toggle('scrolled', currentScroll > 50);
            lastScroll = currentScroll;
        }, { passive: true });

        // Mobile menu toggle with a11y
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuToggle?.addEventListener('click', () => {
            mobileMenuToggle.classList.toggle('active');
            const isOpen = mobileMenu.classList.toggle('active');
            mobileMenuToggle.setAttribute('aria-expanded', String(isOpen));
            mobileMenu.setAttribute('aria-hidden', String(!isOpen));
            document.body.style.overflow = isOpen ? 'hidden' : '';
        });

        // Close mobile menu on link click
        document.querySelectorAll('.mobile-menu-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuToggle.classList.remove('active');
                mobileMenu.classList.remove('active');
                mobileMenuToggle.setAttribute('aria-expanded', 'false');
                mobileMenu.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            });
        });

        // Smooth scroll for all anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (!href || href === '#') return;
                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    const offsetTop = target.getBoundingClientRect().top + window.scrollY - 80;
                    window.scrollTo({ top: offsetTop, behavior: 'smooth' });
                }
            });
        });

        // Lazy reveal optimization using IntersectionObserver
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
        } else {
            // Fallback: show all
            document.querySelectorAll('.reveal').forEach(el => el.classList.add('visible'));
        }

        // Add loading optimization
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });        // Preload critical resources for faster navigation
        const preloadLinks = [
            { href: '/register', as: 'document' },
            { href: '/login', as: 'document' }
        ];

        // Delay preloading to not interfere with initial page load
        requestIdleCallback(() => {
            preloadLinks.forEach(link => {
                const preload = document.createElement('link');
                preload.rel = 'prefetch';
                preload.href = link.href;
                preload.as = link.as;
                document.head.appendChild(preload);
            });
        }, { timeout: 2000 });

        // Enhanced button interactions
        document.querySelectorAll('.btn-gold, .nav-auth .btn-primary').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                // Prefetch on hover for instant navigation
                if (btn.href && !btn.dataset.prefetched) {
                    const link = document.createElement('link');
                    link.rel = 'prefetch';
                    link.href = btn.href;
                    link.as = 'document';
                    document.head.appendChild(link);
                    btn.dataset.prefetched = 'true';
                }
            });
        });

        // Performance monitoring
        if ('PerformanceObserver' in window) {
            const observer = new PerformanceObserver((list) => {
                list.getEntries().forEach((entry) => {
                    // Monitor Largest Contentful Paint
                    if (entry.entryType === 'largest-contentful-paint') {
                        console.log('LCP:', entry.startTime);
                    }
                });
            });

            try {
                observer.observe({ entryTypes: ['largest-contentful-paint'] });
            } catch (e) {
                // Fallback for browsers that don't support observe
            }
        }
    </script>
</body>
</html>
