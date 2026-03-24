@extends('layouts.app')

@section('title', 'Campus Life | EduManage Pro')

@section('content')
    <section class="mb-5">
        <div class="text-center mb-4">
            <span class="badge text-bg-success rounded-pill mb-3">Campus Life</span>
            <h1 class="section-heading">Extra photo gallery page</h1>
            <p class="section-subtext mx-auto">Simplify academic management. Elevate student success.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card p-3">
                    <img src="{{ asset('images/6.jpg') }}" alt="Students in library" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Library study area</h5>
                    <p class="text-secondary mb-0">A calm environment for focused learning and academic collaboration.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card p-3">
                    <img src="{{ asset('images/7.jpg') }}" alt="Classroom session" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Interactive classrooms</h5>
                    <p class="text-secondary mb-0">Modern teaching spaces designed for engaging lectures and workshops.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card p-3">
                    <img src="{{ asset('images/8.jpg') }}" alt="Computer lab" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Digital learning labs</h5>
                    <p class="text-secondary mb-0">Technology-enabled labs that support practical skills and project work.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card p-3">
                    <img src="{{ asset('images/9.jpg') }}" alt="Graduation day" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Student success moments</h5>
                    <p class="text-secondary mb-0">Celebrate progress, achievement, and future opportunities.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card p-3">
                    <img src="{{ asset('images/10.jpg') }}" alt="Campus networking" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Academic networking</h5>
                    <p class="text-secondary mb-0">Encourage teamwork, communication, and career-focused interaction.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="gallery-card p-3">
                    <img src="{{ asset('images/11.jpg') }}" alt="Creative campus area" class="rounded-4 mb-3">
                    <h5 class="fw-bold">Creative learning spaces</h5>
                    <p class="text-secondary mb-0">An inviting campus atmosphere gives the whole website a stronger identity.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
