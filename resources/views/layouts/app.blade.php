<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Course Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #0f172a;
            --primary-accent: #2563eb;
            --soft-bg: #f8fafc;
            --soft-border: #e2e8f0;
            --text-muted-custom: #64748b;
            --success-soft: #dcfce7;
            --warning-soft: #fef3c7;
            --info-soft: #dbeafe;
        }

        * { font-family: 'Inter', sans-serif; }

        body {
            background: linear-gradient(180deg, #f8fbff 0%, #f8fafc 100%);
            color: #0f172a;
        }

        .navbar-custom {
            background: rgba(15, 23, 42, 0.92);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.12);
        }

        .navbar-brand {
            font-weight: 800;
            letter-spacing: .2px;
        }

        .nav-link {
            color: rgba(255,255,255,.82) !important;
            font-weight: 500;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #fff !important;
        }

        .page-section {
            padding: 3rem 0;
        }

        .card-soft {
            border: 1px solid var(--soft-border);
            border-radius: 1.25rem;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
            overflow: hidden;
        }

        .stat-card {
            background: #fff;
            border: 1px solid var(--soft-border);
            border-radius: 1.2rem;
            padding: 1.4rem;
            height: 100%;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.05);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .hero-surface {
            background: radial-gradient(circle at top left, rgba(59,130,246,.18), transparent 32%),
                        linear-gradient(135deg, #0f172a 0%, #1d4ed8 100%);
            border-radius: 2rem;
            padding: 4rem 3rem;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 24px 60px rgba(37, 99, 235, 0.2);
        }

        .hero-surface::after {
            content: '';
            position: absolute;
            width: 240px;
            height: 240px;
            right: -60px;
            top: -60px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .45rem .9rem;
            border-radius: 999px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.15);
            font-size: .9rem;
            margin-bottom: 1rem;
        }

        .feature-card,
        .gallery-card,
        .info-card {
            background: #fff;
            border: 1px solid var(--soft-border);
            border-radius: 1.25rem;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.05);
            height: 100%;
        }

        .feature-card img,
        .gallery-card img,
        .info-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .section-heading {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: .6rem;
        }

        .section-subtext {
            color: var(--text-muted-custom);
            max-width: 720px;
        }

        .table thead th {
            border-bottom: 0;
            font-size: .92rem;
        }

        .table > :not(caption) > * > * {
            padding: 1rem .9rem;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f8fbff;
        }

        .badge-soft {
            border-radius: 999px;
            padding: .5rem .75rem;
            font-weight: 600;
        }

        .footer-custom {
            background: #0f172a;
            color: rgba(255,255,255,.75);
        }

        .page-banner {
            background: linear-gradient(135deg, rgba(37,99,235,.1), rgba(14,165,233,.08));
            border: 1px solid var(--soft-border);
            border-radius: 1.5rem;
            padding: 2rem;
        }

        .empty-state {
            padding: 3rem 1rem;
            text-align: center;
            color: var(--text-muted-custom);
        }

        @media (max-width: 767px) {
            .hero-surface {
                padding: 2.5rem 1.5rem;
            }

            .section-heading {
                font-size: 1.6rem;
            }
        }
        /* Page transition */
.page {
    opacity: 1;
    transition: opacity 0.4s ease;
}

.page.fade-out {
    opacity: 0;
}
.page-content {
    opacity: 0;
    transform: translateY(18px) scale(0.985);
    animation: pageIn 0.65s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

.transition-overlay {
    position: fixed;
    inset: 0;
    background: linear-gradient(135deg, #0f172a, #1d4ed8);
    transform: translateY(100%);
    z-index: 9999;
    pointer-events: none;
}

.transition-overlay.active {
    animation: overlayIn 0.55s cubic-bezier(0.83, 0, 0.17, 1) forwards;
}

.transition-overlay.exit {
    animation: overlayOut 0.7s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}

@keyframes pageIn {
    from {
        opacity: 0;
        transform: translateY(18px) scale(0.985);
        filter: blur(4px);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
    }
}

@keyframes overlayIn {
    from {
        transform: translateY(100%);
        border-radius: 40% 40% 0 0;
    }
    to {
        transform: translateY(0%);
        border-radius: 0;
    }
}

@keyframes overlayOut {
    from {
        transform: translateY(0%);
        border-radius: 0;
    }
    to {
        transform: translateY(-100%);
        border-radius: 0 0 40% 40%;
    }
}
/* ===== PREMIUM BUTTON STYLE ===== */
/* ===== Updated Premium Button Style ===== */
.btn-modern {
    position: relative;
    overflow: hidden;
    border-radius: 12px;
    font-weight: 600;
    padding: 10px 22px;
    transition: all 0.35s ease;
    color: #000; /* Default text color */
}

/* Hover state */
.btn-modern:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    color: #fff; /* Change text color on hover to white */
    background-color: #1D4ED8; /* You can change this to any desired color */
}

/* Click press effect */
.btn-modern:active {
    transform: scale(0.97);
}

/* Glow effect on hover */
.btn-modern::after {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,0.5), transparent);
    transition: all 0.5s;
}

.btn-modern:hover::after {
    left: 100%;
}
/* Navbar text color */
.navbar-nav .nav-link {
    color: black !important; /* Change text color to black */
    font-weight: 500; /* Optional: You can make the text weight bold */
    transition: color 0.3s ease;
}

/* Hover effect on nav links */
.navbar-nav .nav-link:hover {
    color: #1D4ED8; /* Optional: Change hover color to blue or any color you want */
}
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
        <div class="container py-2">
            <a class="navbar-brand" href="{{ route('home') }}">EduManage Pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item btn btn-light btn-lg btn-modern"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item btn btn-light btn-lg btn-modern"><a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">Students</a></li>
                    <li class="nav-item btn btn-light btn-lg btn-modern"><a class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">Courses</a></li>
                    <li class="nav-item btn btn-light btn-lg btn-modern"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                    <li class="nav-item btn btn-light btn-lg btn-modern"><a class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}" href="{{ route('gallery') }}">Campus Life</a></li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0"><a class="btn btn-light btn-outline btn-modern" href="{{ route('students.create') }}">Add Student</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="page-section">
        <div class="container">
            <div class="transition-overlay" id="transition-overlay"></div>

<div class="container py-4">
    <div class="page-content" id="page-content">
        @yield('content')
    </div>
</div>
        </div>
    </main>

    <footer class="footer-custom mt-5 py-4">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-2 align-items-md-center">
            <div>
                <strong class="text-white">EduManage Pro</strong><br>
                <small>Professional student and course management for modern academic teams.</small>
            </div>
            <small>Built with Laravel & Bootstrap</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const overlay = document.getElementById("transition-overlay");

    window.addEventListener("load", function () {
        overlay.classList.add("exit");
    });

    document.querySelectorAll("a").forEach(link => {
        const href = link.getAttribute("href");

        if (!href) return;
        if (href.startsWith("#")) return;
        if (link.hasAttribute("target")) return;
        if (link.hostname !== window.location.hostname) return;

        link.addEventListener("click", function (e) {
            e.preventDefault();
            overlay.classList.remove("exit");
            overlay.classList.add("active");

            setTimeout(() => {
                window.location.href = href;
            }, 500);
        });
    });
});
</script>
</body>
</html>
