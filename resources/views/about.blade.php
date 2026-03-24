@extends('layouts.app')

@section('title', 'About | EduManage Pro')

@section('content')
    <section class="page-banner mb-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-8">
                <span class="badge text-bg-primary rounded-pill mb-3">About the platform</span>
                <h1 class="section-heading mb-2">A professional student management website</h1>
                <p class="section-subtext mb-0">This page gives your project a more complete university-style presentation and explains what the system does.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <img src="{{ asset('images/12.jpg') }}" alt="About education" class="img-fluid rounded-4 shadow-sm">
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="stat-card"><h3 class="fw-bold">{{ $studentCount }}</h3><p class="text-secondary mb-0">Students managed through the platform.</p></div>
            </div>
            <div class="col-md-4">
                <div class="stat-card"><h3 class="fw-bold">{{ $courseCount }}</h3><p class="text-secondary mb-0">Courses ready for academic organization.</p></div>
            </div>
            <div class="col-md-4">
                <div class="stat-card"><h3 class="fw-bold">{{ $assignedCount }}</h3><p class="text-secondary mb-0">Active course assignments in the database.</p></div>
            </div>
        </div>
    </section>

    <section>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="info-card p-4 h-100">
                    <h4 class="fw-bold">Mission</h4>
                    <p class="text-secondary mb-0">Support academic administration with an interface that is simple, attractive, and easier to demonstrate in coursework or project submissions.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-card p-4 h-100">
                    <h4 class="fw-bold">What’s improved</h4>
                    <p class="text-secondary mb-0">A new layout, better navigation, modern cards, dashboard sections, cleaner forms, and extra photo-based pages for a more realistic website feel.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-card p-4 h-100">
                    <h4 class="fw-bold">Best use</h4>
                    <p class="text-secondary mb-0">Perfect for college demos, Laravel practice projects, student management prototypes, or portfolio presentation.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
