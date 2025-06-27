<?php
include('admin/main.php');
$object = new batch_details();
include 'header.php';
?>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-color: #10b981;
        --border-radius: 16px;
        --shadow-soft: 0 10px 25px rgba(0, 0, 0, 0.08);
        --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .card-modern {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: var(--border-radius);
        box-shadow: var(--shadow-soft);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .card-modern-header {
        background: var(--primary-gradient);
        color: white;
        padding: 0.5rem 1.5rem;
        border: none;
        position: relative;
    }

    .card-modern-body {
        padding: 1.5rem;
        color: #333;
        font-size: 1rem;
        line-height: 1.6;
    }

    .card-modern-footer {
        padding: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

    .card-modern-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        opacity: 0.3;
    }

    /* --- New Step Indicator Styles --- */
    .step-indicator-wrapper {
        padding-bottom: 20px;
        margin-bottom: 2rem;
        border-bottom: 1px solid #e9ecef;
    }

    /* Desktop Indicator (Visible on md screens and up) */
    .step-indicator {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: space-between;
    }

    .step-indicator li {
        flex: 1;
        position: relative;
        text-align: center;
        color: #6c757d;
        /* Default text color */
    }

    /* The Connector Line */
    .step-indicator li:not(:last-child)::after {
        content: "";
        position: absolute;
        left: 50%;
        top: 15px;
        /* Vertically center with the circle */
        width: 100%;
        height: 4px;
        background-color: #dee2e6;
        /* Default line color */
        z-index: 1;
    }

    /* The Circle */
    .step-indicator li .step-circle {
        position: relative;
        z-index: 2;
        width: 30px;
        height: 30px;
        margin: 0 auto 10px;
        border-radius: 50%;
        background-color: #fff;
        border: 4px solid #dee2e6;
        /* Default border */
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .step-label {
        font-size: 0.85rem;
        font-weight: 500;
    }

    /* Active State */
    .step-indicator li.active .step-circle {
        border-color: #0d6efd;
        /* Active border color */
        background-color: #0d6efd;
        color: white;
    }

    .step-indicator li.active .step-label {
        color: #0d6efd;
        /* Active text color */
        font-weight: bold;
    }

    /* Completed State */
    .step-indicator li.completed .step-circle {
        border-color: #198754;
        /* Completed border color */
        background-color: #198754;
        color: white;
    }

    .step-indicator li.completed .step-circle i {
        display: block;
        /* Show the check icon */
    }

    .step-indicator li.completed .step-label {
        color: #198754;
        /* Completed text color */
    }

    /* The line color for completed steps */
    .step-indicator li.completed::after {
        background-color: #198754;
    }

    /* Hide check icon by default */
    .step-indicator .step-circle i {
        display: none;
    }

    /* --- Responsive Handling --- */

    /* Mobile Indicator (Visible on sm screens and down) */
    #mobile-step-indicator {
        display: none;
        /* Hidden by default */
        font-size: 1.1rem;
        font-weight: 500;
        color: #495057;
    }

    /* Media Query for screens smaller than medium (768px) */
    @media (max-width: 767.98px) {
        .step-indicator {
            display: none;
            /* Hide desktop indicator */
        }

        #mobile-step-indicator {
            display: block;
            /* Show mobile indicator */
        }
    }

    .form-step {
        display: none;
    }

    .form-step.active {
        display: block;
    }

    .terms-text {
        background-color: #f8f9fa;
    }

    .terms-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a202c;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .terms-title::before {
        content: '📋';
        font-size: 1.8rem;
    }

    .requirements-list {
        list-style: none;
        margin: 0;
        padding: 0;
        counter-reset: requirement-counter;
    }

    .requirement-item {
        counter-increment: requirement-counter;
        margin-bottom: 20px;
        padding: 20px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
        border-radius: 16px;
        border-left: 4px solid #667eea;
        position: relative;
        transition: all 0.3s ease;
    }

    .requirement-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
    }

    .requirement-item::before {
        content: counter(requirement-counter);
        position: absolute;
        left: -12px;
        top: 20px;
        width: 24px;
        height: 24px;
        background: #667eea;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .requirement-title {
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 8px;
        font-size: 1.1rem;
    }

    .requirement-text {
        color: #4a5568;
        line-height: 1.6;
        font-size: 1rem;
    }

    .requirement-text .bn,
    .requirement-title .bn {
        display: none;
    }

    .agreement-section {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.05), rgba(59, 130, 246, 0.05));
        border-radius: 16px;
        padding: 24px;
        border: 1px solid rgba(34, 197, 94, 0.1);
    }

    .checkbox-container {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .checkbox-container:hover {
        transform: translateX(4px);
    }

    .custom-checkbox {
        position: relative;
        width: 24px;
        height: 24px;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .checkbox-input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 24px;
        width: 24px;
        background: white;
        border: 2px solid #d1d5db;
        border-radius: 6px;
        transition: all 0.3s ease;
    }

    .checkbox-input:checked~.checkmark {
        background: #22c55e;
        border-color: #22c55e;
        transform: scale(1.1);
    }

    .checkmark::after {
        content: "";
        position: absolute;
        display: none;
        left: 7px;
        top: 3px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .checkbox-input:checked~.checkmark::after {
        display: block;
    }

    .checkbox-label {
        font-size: 1.1rem;
        color: #374151;
        font-weight: 500;
        line-height: 1.5;
    }

    .section-description {
        color: #4a5568;
        font-size: 1.1rem;
        line-height: 1.6;
        padding: 20px;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(147, 51, 234, 0.05));
        border-radius: 12px;
    }

    .section-description.reference {
        border-left: 4px solid #3b82f6;
    }

    .section-description.personal {
        border-left: 4px solid #f59e0b;
    }

    .input-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
        font-size: 1rem;
    }

    .input-container {
        position: relative;
    }

    .custom-input {
        width: 100%;
        padding: 8px 50px 8px 16px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 1rem;
        background: white;
        transition: all 0.3s ease;
        outline: none;
    }

    .is-valid {
        border-color: #22c55e !important;
        box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        transform: translateY(-1px);
    }

    .is-invalid {
        border-color: #dc2626 !important;
        box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        transform: translateY(-1px);
    }

    .custom-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-1px);
    }

    .custom-input:valid {
        border-color: #22c55e;
    }

    .select-input {
        cursor: pointer;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3e%3cpath fill='%23666' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 50px center;
        background-size: 12px;
        padding-right: 40px;
    }

    .select-input option {
        padding: 10px;
        font-size: 1rem;
    }

    .date-input::-webkit-calendar-picker-indicator {
        cursor: pointer;
        filter: invert(0.5);
    }

    .input-icon {
        position: absolute;
        right: 16px;
        top: 50%;
        font-size: 1.2rem;
        color: #9ca3af;
        pointer-events: none;
    }

    .bangla-input {
        font-family: 'SolaimanLipi', 'Kalpurush', 'Nikosh', sans-serif;
        direction: ltr;
    }

    .status-message {
        padding: 16px;
        border-radius: 12px;
        font-weight: 500;
        margin-bottom: 16px;
    }

    .status-message.success {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.1), rgba(16, 185, 129, 0.1));
        color: #059669;
        border: 1px solid rgba(34, 197, 94, 0.2);
    }

    .status-message.error {
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
        color: #dc2626;
        border: 1px solid rgba(239, 68, 68, 0.2);
    }

    .upload-zone {
        position: relative;
        background: linear-gradient(145deg, #f8fafc, #e2e8f0);
        border: 2px dashed #cbd5e1;
        border-radius: 12px;
        padding: 2rem;
        transition: all 0.3s ease;
        cursor: pointer;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .upload-zone:hover {
        border-color: #667eea;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        transform: scale(1.02);
    }

    .upload-zone.dragover {
        border-color: var(--success-color);
        background: linear-gradient(145deg, #ecfdf5, #d1fae5);
    }

    .preview-image {
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        object-fit: cover;
    }

    .preview-image:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
    }

    .upload-btn {
        background: var(--primary-gradient);
        border: none;
        border-radius: 25px;
        padding: 0.75rem 2rem;
        font-weight: 500;
        color: white;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .upload-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        color: white;
    }

    .upload-icon {
        font-size: 2.5rem;
        color: #64748b;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .upload-zone:hover .upload-icon {
        color: #667eea;
        transform: scale(1.1);
    }

    .upload-text {
        color: #64748b;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .upload-subtext {
        color: #94a3b8;
        font-size: 0.875rem;
    }

    .signature-note {
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border: 1px solid #f59e0b;
        border-radius: 8px;
        padding: 0.75rem;
        margin-top: 1rem;
        font-size: 0.8rem;
        position: relative;
        overflow: hidden;
    }

    .signature-note::before {
        content: '⚠️';
        margin-right: 0.5rem;
    }

    .signature-note a {
        color: #d97706;
        font-weight: 600;
        text-decoration: none;
    }

    .signature-note a:hover {
        text-decoration: underline;
    }

    .progress-bar {
        height: 4px;
        background: var(--primary-gradient);
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .file-info {
        background: rgba(16, 185, 129, 0.1);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 8px;
        padding: 0.75rem;
        margin-top: 1rem;
        color: var(--success-color);
        font-size: 0.875rem;
        display: none;
    }

    @media (max-width: 768px) {
        .upload-zone {
            padding: 1.5rem;
            min-height: 150px;
        }
    }

    .animate-pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    /* Examples Section Styles */
    .examples-section {
        border-top: 1px solid #e2e8f0;
        padding-top: 1.5rem;
    }

    .example-card-modern {
        background: white;
        border-radius: 12px;
        padding: 1rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        text-align: center;
        border: 2px solid transparent;
    }

    .example-card-modern.valid {
        border-color: rgba(16, 185, 129, 0.2);
        background: linear-gradient(145deg, #f0fdf4, #ffffff);
    }

    .example-card-modern.invalid {
        border-color: rgba(239, 68, 68, 0.2);
        background: linear-gradient(145deg, #fef2f2, #ffffff);
    }

    .example-card-modern:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .example-header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
        font-size: 0.75rem;
    }

    .example-img {
        width: 80px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #e2e8f0;
        margin-bottom: 0.75rem;
    }

    .example-img.grayscale {
        filter: grayscale(100%) contrast(1.2);
        opacity: 0.7;
    }

    .signature-example {
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        margin-bottom: 0.75rem;
        border: 1px solid #e2e8f0;
    }

    .signature-example.valid-signature {
        background: white;
    }

    .signature-example.invalid-signature {
        background: #f8fafc;
    }

    .example-text {
        color: #64748b;
        font-size: 0.7rem;
        line-height: 1.3;
    }

    .example-card-modern.valid .example-text {
        color: #059669;
    }

    .example-card-modern.invalid .example-text {
        color: #dc2626;
    }
</style>

<!-- Header -->
<div id="topbar">
    <div class="container px-0 px-lg-5">
        <div
            class="d-flex justify-content-between py-3 align-items-center custom-border-bottom-yellow z-index">
            <button
                class="custom-btn d-lg-none bg-yellow rounded-normal ms-3"
                style="font-size: 18px"
                id="menu-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a href="index.php"><img src="img/logo2.png" width="180" /></a>
            <div class="sam" id="nav">
                <ul class="nav">
                    <li>
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li>
                        <a href="about.php" class="nav-link">About Us</a>
                    </li>
                    <li>
                        <a href="projects.php" class="nav-link">Projects</a>
                    </li>
                    <li>
                        <a href="events.php" class="nav-link">Events</a>
                    </li>
                    <li>
                        <a href="blogs.php" class="nav-link">Blogs</a>
                    </li>
                    <li>
                        <a href="contact.php" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
            <a
                href="donate.php"
                class="custom-btn bg-green hover-dark-blue rounded me-3 me-lg-0"
                style="font-size: 13px">
                DONATE NOW
            </a>
        </div>
    </div>
</div>

<!--banner-top-->
<section class="banner-top">
    <div class="banner-overlayer"></div>
    <div
        class="container px-4 px-lg-5 d-flex flex-column justify-content-center align-items-center h-100">
        <h2 class="text-white quicksand fw-bold" id="reveal-up">
            Join Form
        </h2>
        <div class="breadcrumb-list" id="reveal-left">
            <a href="index.php" class="text-white">Home</a>
            <i class="fa-solid fa-angles-right text-white mx-2"></i>
            <span class="text-green">Join Form</span>
        </div>
    </div>
</section>

<!--Join form-->
<section class="py-5">
    <div class="container px-4">
        <div class="row g-0 mb-3">
            <div class="col-md-12">
                <!-- Mobile Indicator (simple text) -->
                <div id="mobile-step-indicator" class="text-center mb-3"></div>

                <!-- Desktop Indicator (connecting lines) -->
                <ol class="step-indicator">
                    <li class="active" data-step-name="Terms">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Terms</span>
                    </li>
                    <li data-step-name="Tutorial">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Tutorial</span>
                    </li>
                    <li data-step-name="Reference">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Reference</span>
                    </li>
                    <li data-step-name="Email">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Email</span>
                    </li>
                    <li data-step-name="Personal">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Personal</span>
                    </li>
                    <li data-step-name="Parents">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Parents</span>
                    </li>
                    <li data-step-name="Address">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Address</span>
                    </li>
                    <li data-step-name="Education">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Education</span>
                    </li>
                    <li data-step-name="Documents">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Documents</span>
                    </li>
                    <li data-step-name="Submit">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Submit</span>
                    </li>
                </ol>
            </div>
        </div>

        <form id="registrationForm" enctype="multipart/form-data" action="">
            <!-- Step 1: Terms and Conditions -->
            <div class="form-step active" data-step="1">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 1: Terms and Conditions</h4>
                    </div>
                    <div class="card-modern-body p-4">
                        <div class="terms-text">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="terms-title">Membership Eligibility Requirements</h5>
                                <button type="button" id="toggleLangBtn" class="btn btn-secondary btn-sm">বাংলা</button>
                            </div>
                            <ol class="requirements-list">
                                <li class="requirement-item">
                                    <div class="requirement-title">
                                        <span class="en">Educational Qualification</span>
                                        <span class="bn">শিক্ষাগত যোগ্যতা</span>
                                    </div>
                                    <div class="requirement-text">
                                        <span class="en">The primary requirement for becoming a member of Youth Save A Smile Foundation is to have participated in and successfully passed the SSC examination from any school.</span>
                                        <span class="bn">ইয়ুথ সেইভ এ স্মাইল ফাউন্ডেশনের সদস্য হতে হলে যেকোনো স্কুল থেকে এসএসসি পরীক্ষায় অংশগ্রহণ করতে হবে এবং কৃতকার্য হতে হবে।</span>
                                    </div>
                                </li>

                                <li class="requirement-item">
                                    <div class="requirement-title">
                                        <span class="en">Membership Application</span>
                                        <span class="bn">সদস্যপদ আবেদন</span>
                                    </div>
                                    <div class="requirement-text">
                                        <span class="en">To obtain membership in the Youth Save A Smile Foundation, one must contact any regular member of the foundation and, with that member's recommendation, submit the necessary information in the designated membership form. The applicant must express their commitment to voluntary humanitarian service and sign accordingly, subject to the consideration of the President or General Secretary.</span>
                                        <span class="bn">ইয়ুথ সেইভ এ স্মাইল ফাউন্ডেশনের সদস্যপদ লাভের জন্য ফাউন্ডেশনের যেকোনো নিয়মিত সদস্যের সাথে যোগাযোগ করে সেই সদস্যের সুপারিশে সভাপতি বা সাধারণ সম্পাদকের বিবেচনায় নির্দিষ্ট সদস্যভুক্তি ফর্মে প্রয়োজনীয় তথ্যাদি প্রদানপূর্বক স্বেচ্ছায় মানবসেবা দানের প্রত্যয় ব্যক্ত করে স্বাক্ষর প্রদানের মাধ্যমে সদস্যপদ গ্রহণ করতে হবে।</span>
                                    </div>
                                </li>

                                <li class="requirement-item">
                                    <div class="requirement-title">
                                        <span class="en">Personal Qualities</span>
                                        <span class="bn">ব্যক্তিগত গুণাবলী</span>
                                    </div>
                                    <div class="requirement-text">
                                        <span class="en">Members must be courteous, tolerant, enthusiastic, humble, thoughtful, and responsible.</span>
                                        <span class="bn">ভদ্র, পরমতসহিষ্ণু, উদ্যোমী, নিরহংকারী, মননশীল, দায়িত্ববোধসম্পন্ন হতে হবে।</span>
                                    </div>
                                </li>

                                <li class="requirement-item">
                                    <div class="requirement-title">
                                        <span class="en">Monthly Contribution</span>
                                        <span class="bn">মাসিক অবদান</span>
                                    </div>
                                    <div class="requirement-text">
                                        <span class="en">Each member must pay monthly donation as decided by the Executive Committee.</span>
                                        <span class="bn">প্রতিটি সদস্যকে কার্যনির্বাহী কমিটির সিদ্ধান্ত অনুযায়ী মাসিক অনুদান প্রদান করতে হবে।</span>
                                    </div>
                                </li>

                                <li class="requirement-item">
                                    <div class="requirement-title">
                                        <span class="en">Volunteer Spirit</span>
                                        <span class="bn">স্বেচ্ছাসেবী মনোভাব</span>
                                    </div>
                                    <div class="requirement-text">
                                        <span class="en">Priority will be given to students who have a volunteer mindset, wish to contribute to the overall development of their batch and social development, are involved or willing to be involved in various creative works, and are not engaged in any immoral activities.</span>
                                        <span class="bn">স্বেচ্ছাসেবী মনোভাবসম্পন্ন, নিজ ব্যাচের সার্বিক উন্নয়ন ও সামাজিক উন্নয়নে অবদান রাখতে ইচ্ছুক, বিভিন্ন সৃজনশীল কাজে জড়িত বা জড়িত হতে ইচ্ছুক এবং কোনো অশ্লীল কাজে জড়িত নয় এমন শিক্ষার্থীদের অগ্রাধিকার দেওয়া হবে।</span>
                                    </div>
                                </li>

                                <li class="requirement-item">
                                    <div class="requirement-title">
                                        <span class="en">Commitment to Excellence</span>
                                        <span class="bn">সেরা হওয়ার অঙ্গীকার</span>
                                    </div>
                                    <div class="requirement-text">
                                        <span class="en">Priority will be given to students who are committed to the maximum development of their talents and are interested in contributing to the development of their batch mates and humanity.</span>
                                        <span class="bn">সর্বোচ্চ প্রতিভা বিকাশে অঙ্গীকারবদ্ধ, নিজ ব্যাচের সহপাঠীদের উন্নয়ন ও মানবতার উন্নয়নে অবদান রাখতে ইচ্ছুক শিক্ষার্থীদের অগ্রাধিকার দেওয়া হবে।</span>
                                    </div>
                                </li>
                            </ol>
                        </div>
                        <div class="agreement-section">
                            <label class="checkbox-container" for="agreeTerms">
                                <div class="custom-checkbox">
                                    <input type="checkbox" id="agreeTerms" class="checkbox-input" required>
                                    <span class="checkmark"></span>
                                </div>
                                <span class="checkbox-label">
                                    I agree to the terms and conditions of Save A Smile Foundation and commit to upholding the values and responsibilities outlined above.
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()"
                            id="step1Next"
                            disabled>
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 2: Tutorial -->
            <div class="form-step" data-step="2">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 2: Tutorial</h4>
                    </div>
                    <div class="card-modern-body">
                        <p class="section-description personal">
                            Before proceeding, please watch the tutorial video below to understand the registration process and requirements.
                        </p>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-pc-tab" data-bs-toggle="pill" data-bs-target="#pills-pc" type="button" role="tab" aria-controls="pills-pc" aria-selected="true">For PC</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-mobile-tab" data-bs-toggle="pill" data-bs-target="#pills-mobile" type="button" role="tab" aria-controls="pills-mobile" aria-selected="false">For Mobile</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-pc" role="tabpanel" aria-labelledby="pills-pc-tab" tabindex="0">
                                <video controls width="100%" height="400">
                                    <source src="videos/tutorial-pc.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="tab-pane fade" id="pills-mobile" role="tabpanel" aria-labelledby="pills-mobile-tab" tabindex="0">
                                <video controls width="100%" height="400">
                                    <source src="videos/tutorial-mobile.mp4" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>

                        <p class="text-muted">
                            If you have any questions or need assistance, please contact us at
                        </p>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()"
                            id="step2Next">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 3: Reference Code -->
            <div class="form-step" data-step="3">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 3: Reference Verification</h4>
                    </div>
                    <div class="card-modern-body">
                        <p class="section-description reference">
                            Please enter the reference code provided by an existing member of the foundation to verify your connection and eligibility.
                        </p>

                        <div class="input-container my-3">
                            <label for="referenceCode" class="input-label">Reference Code *</label>

                            <input
                                type="text"
                                class="custom-input"
                                id="referenceCode"
                                name="referenceCode"
                                placeholder="Enter the reference code from a member"
                                required />
                            <div class="input-icon">🔑</div>

                            <div class="error-message" id="referenceError"></div>
                        </div>

                        <div id="referenceStatus"></div>

                        <button type="button" class="btn btn-info text-white" id="verifyBtn" onclick="verifyReference()">
                            Verify Reference
                        </button>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()"
                            id="step3Next"
                            disabled>
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 4: Email Verification -->
            <div class="form-step" data-step="4">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 4: Email Verification</h4>
                    </div>
                    <div class="card-modern-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="custom-input" id="email" name="email" placeholder="Enter your valid email address" required>
                        </div>
                        <button type="button" class="btn btn-info text-white" onclick="sendVerificationCode()" id="sendCodeBtn">Send Verification Code</button>

                        <div id="verificationSection" style="display: none;" class="mt-3">
                            <div class="mb-3">
                                <label for="verificationCode" class="form-label">Verification Code *</label>
                                <input type="text" class="custom-input" id="verificationCode" name="verificationCode" maxlength="6" placeholder="Enter 6-digit code">
                                <div class="form-text">
                                    <span id="timerDisplay" class="text-warning"></span>
                                    <span id="expiredText" class="text-danger" style="display: none;">Code expired. Please request a new one.</span>
                                </div>
                            </div>
                            <div id="emailStatus"></div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-success" onclick="verifyEmail()" id="verifyBtn">Verify Code</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="resendCode()" id="resendBtn" style="display: none;">Resend Code</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button type="button" class="btn btn-secondary me-2" onclick="prevStep()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep()" id="step4Next" disabled>Next</button>
                    </div>
                </div>
            </div>

            <!-- Step 5: Personal Details -->
            <div class="form-step" data-step="5">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 5: Personal Details</h4>
                    </div>
                    <div class="card-modern-body">
                        <p class="section-description personal">
                            Please provide your personal information accurately as it will be used for your membership records.
                        </p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-container">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input
                                        type="text"
                                        class="custom-input"
                                        id="firstName"
                                        name="firstName"
                                        placeholder="Enter your first name"
                                        required />
                                    <div class="input-icon">👤</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-container">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input
                                        type="text"
                                        class="custom-input"
                                        id="lastName"
                                        name="lastName"
                                        placeholder="Enter your last name"
                                        required />
                                    <div class="input-icon">👤</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-container">
                                    <label for="nameBangla" class="form-label">নাম (বাংলা) *</label>
                                    <input
                                        type="text"
                                        class="custom-input bangla-input"
                                        id="nameBangla"
                                        name="nameBangla"
                                        placeholder="আপনার নাম বাংলায় লিখুন"
                                        required />
                                    <div class="input-icon">🇧🇩</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="dateOfBirth" class="form-label">Date of Birth *</label>
                                    <input
                                        type="date"
                                        class="custom-input date-input"
                                        id="dateOfBirth"
                                        name="dateOfBirth"
                                        required />
                                    <div class="input-icon">📅</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="bloodGroup" class="form-label">Blood Group *</label>
                                    <select
                                        class="custom-input select-input"
                                        id="bloodGroup"
                                        name="bloodGroup"
                                        required>
                                        <option value="">Select Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                    <div class="input-icon">🩸</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 5: Parents Information -->
            <div class="form-step" data-step="6">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 6: Parents Information</h4>
                    </div>
                    <div class="card-modern-body">
                        <p class="section-description personal">
                            Please provide your parent's information accurately as it will be used for your membership records.
                        </p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="motherName" class="form-label">Mother's Name *</label>
                                    <input
                                        type="text"
                                        class="custom-input"
                                        id="motherName"
                                        name="motherName"
                                        placeholder="Enter your mother's name"
                                        required />
                                    <div class="input-icon">👩‍👧</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="motherProfession" class="form-label">Mother's Profession *</label>
                                    <select
                                        class="custom-input select-input"
                                        id="motherProfession"
                                        name="motherProfession"
                                        required>
                                        <option value="">Select your mother's profession</option>
                                        <option value="Government Service Holder">Government Service Holder</option>
                                        <option value="Non-government Service Holder">Non-government Service Holder</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Business">Business</option>
                                        <option value="Housewife">Housewife</option>
                                        <option value="Banker">Banker</option>
                                        <option value="Nurse">Nurse</option>
                                        <option value="N/A (Retired)">N/A (Retired)</option>
                                        <option value="N/A (Late)">N/A (Late)</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <div class="input-icon">👩‍🏫</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="fatherName" class="form-label">Father's Name *</label>
                                    <input
                                        type="text"
                                        class="custom-input"
                                        id="fatherName"
                                        name="fatherName"
                                        placeholder="Enter your father's name"
                                        required />
                                    <div class="input-icon">👨‍👦</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="fatherProfession" class="form-label">Father's Profession *</label>
                                    <select
                                        class="custom-input select-input"
                                        id="fatherProfession"
                                        name="fatherProfession"
                                        required>
                                        <option value="">Select your father's profession</option>
                                        <option value="Government Service Holder">Government Service Holder</option>
                                        <option value="Non-government Service Holder">Non-government Service Holder</option>
                                        <option value="Farmer">Farmer</option>
                                        <option value="Doctor">Doctor</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Business">Business</option>
                                        <option value="Police">Police</option>
                                        <option value="Army Personnel">Army Personnel</option>
                                        <option value="Banker">Banker</option>
                                        <option value="N/A (Retired)">N/A (Retired)</option>
                                        <option value="N/A (Late)">N/A (Late)</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    <div class="input-icon">👨‍🏫</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 6: Address and Contact -->
            <div class="form-step" data-step="7">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 7: Address and Contact Information</h4>
                    </div>
                    <div class="card-modern-body">
                        <p class="section-description personal">
                            Please provide your contact information accurately as it will be used for your membership records.
                        </p>
                        <h5>Permanent Address</h5>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-container">
                                    <label for="district" class="form-label">District *</label>
                                    <select
                                        class="custom-input select-input"
                                        id="district"
                                        name="district"
                                        required
                                        onchange="loadUpazilas()">
                                        <option value="">Select District</option>
                                        <option value="Bandarban">Bandarban</option>
                                        <option value="Khagrachari">Khagrachari</option>
                                        <option value="Rangamati">Rangamati</option>
                                    </select>
                                    <div class="input-icon">📍</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-container">
                                    <label for="upazila" class="form-label">Upazila *</label>
                                    <select
                                        class="custom-input select-input"
                                        id="upazila"
                                        name="upazila"
                                        required>
                                        <option value="">Select Upazila</option>
                                    </select>
                                    <div class="input-icon">📍</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-container">
                                    <label for="village" class="form-label">Village/Area *</label>
                                    <input
                                        type="text"
                                        class="custom-input"
                                        id="village"
                                        name="village"
                                        placeholder="Enter your village or area"
                                        required />
                                    <div class="input-icon">🏡</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="personalMobile" class="form-label">Mobile No (Personal) *</label>
                                    <input
                                        type="tel"
                                        class="custom-input"
                                        id="personalMobile"
                                        name="personalMobile"
                                        placeholder="Enter your personal mobile number"
                                        required />
                                    <div class="input-icon">📱</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="homeMobile" class="form-label">Mobile No (Home)</label>
                                    <input
                                        type="tel"
                                        class="custom-input"
                                        id="homeMobile"
                                        name="homeMobile"
                                        placeholder="Enter your home mobile number"
                                        required />
                                    <div class="input-icon">🏠</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 7: Education Information -->
            <div class="form-step" data-step="8">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 8: Education Information</h4>
                    </div>
                    <div class="card-modern-body">
                        <p class="section-description personal">
                            Please provide your contact information accurately as it will be used for your membership records.
                        </p>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="sscBatch" class="form-label">SSC Batch *</label>
                                    <select
                                        class="custom-input select-input"
                                        id="sscBatch"
                                        name="sscBatch"
                                        required>
                                        <option value="">Select SSC Batch</option>
                                        <?php
                                        echo $object->fetch_batches(false);
                                        ?>
                                    </select>
                                    <div class="input-icon">🎓</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-container">
                                    <label for="sscSchool" class="form-label">SSC School *</label>
                                    <input
                                        type="text"
                                        class="custom-input"
                                        id="sscSchool"
                                        name="sscSchool"
                                        placeholder="Enter your SSC School Name"
                                        required />
                                    <div class="input-icon">🏫</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 8: Documents -->
            <div class="form-step" data-step="9">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 9: Upload Documents</h4>
                    </div>
                    <div class="card-modern-body">
                        <div class="row g-4">
                            <!-- Photo Upload Section -->
                            <div class="col-md-6">
                                <div class="upload-zone" onclick="document.getElementById('photo').click()">
                                    <div class="text-center">
                                        <img src="https://via.placeholder.com/200x200/e2e8f0/64748b?text=Profile+Photo"
                                            id="preimage"
                                            class="preview-image mb-3"
                                            width="200"
                                            height="200"
                                            style="display: none;">
                                        <div id="photo-placeholder">
                                            <i class="fas fa-user-circle upload-icon"></i>
                                            <div class="upload-text">Profile Picture</div>
                                            <div class="upload-subtext">Click to select or drag & drop</div>
                                            <div class="upload-subtext">JPG, PNG (Max 5MB)</div>
                                        </div>
                                    </div>
                                    <input type="file"
                                        name="photo"
                                        id="photo"
                                        accept="image/*"
                                        onchange="loadfile('preimage', event)"
                                        style="display: none;"
                                        required>
                                    <input type="hidden" name="photo_name" id="photo_name">
                                </div>
                                <div class="file-info" id="photo-info">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span id="photo-filename"></span>
                                </div>

                                <!-- Photo Examples -->
                                <div class="examples-section mt-4">
                                    <h6 class="text-center mb-3 fw-bold text-secondary">Photo Requirements</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="example-card-modern valid">
                                                <div class="example-header">
                                                    <i class="fas fa-check-circle text-success"></i>
                                                    <span class="fw-bold text-success">VALID</span>
                                                </div>
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&h=200&fit=crop&crop=face"
                                                    class="example-img" alt="Valid photo example">
                                                <div class="example-text">
                                                    <small>✓ Full face visible<br>✓ Centered position<br>✓ Natural lighting</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="example-card-modern invalid">
                                                <div class="example-header">
                                                    <i class="fas fa-times-circle text-danger"></i>
                                                    <span class="fw-bold text-danger">INVALID</span>
                                                </div>
                                                <img src="https://images.unsplash.com/photo-1521119989659-a83eee488004?w=150&h=200&fit=crop&crop=face"
                                                    class="example-img grayscale" alt="Invalid photo example">
                                                <div class="example-text">
                                                    <small>✗ Wearing sunglasses<br>✗ Not suitable format<br>✗ Casual/selfie style</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Signature Upload Section -->
                            <div class="col-md-6">
                                <div class="upload-zone" onclick="document.getElementById('sign').click()">
                                    <div class="text-center">
                                        <img src="https://via.placeholder.com/240x70/e2e8f0/64748b?text=Digital+Signature"
                                            id="preimage2"
                                            class="preview-image mb-3"
                                            width="240"
                                            height="70"
                                            style="display: none;">
                                        <div id="sign-placeholder">
                                            <i class="fas fa-signature upload-icon"></i>
                                            <div class="upload-text">Digital Signature</div>
                                            <div class="upload-subtext">Click to select or drag & drop</div>
                                            <div class="upload-subtext">PNG, JPG (Transparent background)</div>
                                        </div>
                                    </div>
                                    <input type="file"
                                        name="sign"
                                        id="sign"
                                        accept="image/*"
                                        onchange="loadfile('preimage2', event)"
                                        style="display: none;"
                                        required>
                                </div>

                                <div class="file-info" id="sign-info">
                                    <i class="fas fa-check-circle me-2"></i>
                                    <span id="sign-filename"></span>
                                </div>

                                <!-- Signature Examples -->
                                <div class="examples-section mt-4">
                                    <h6 class="text-center mb-3 fw-bold text-secondary">Signature Requirements</h6>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="example-card-modern valid">
                                                <div class="example-header">
                                                    <i class="fas fa-check-circle text-success"></i>
                                                    <span class="fw-bold text-success">VALID</span>
                                                </div>
                                                <div class="signature-example valid-signature">
                                                    <svg width="120" height="40" viewBox="0 0 120 40">
                                                        <path d="M10 25 Q15 15 25 20 T45 25 Q50 20 60 25 T80 20 Q85 25 95 20 T110 25" stroke="#2563eb" stroke-width="2.5" fill="none" stroke-linecap="round" />
                                                    </svg>
                                                </div>
                                                <div class="example-text">
                                                    <small>✓ Clean white background<br>✓ Properly cropped<br>✓ Clear signature</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="example-card-modern invalid">
                                                <div class="example-header">
                                                    <i class="fas fa-times-circle text-danger"></i>
                                                    <span class="fw-bold text-danger">INVALID</span>
                                                </div>
                                                <div class="signature-example invalid-signature">
                                                    <svg width="120" height="40" viewBox="0 0 120 40">
                                                        <rect width="120" height="40" fill="#f3f4f6" stroke="#d1d5db" />
                                                        <path d="M15 25 Q20 15 30 20 T50 25 Q55 20 65 25 T85 20 Q90 25 100 20" stroke="#6b7280" stroke-width="2" fill="none" stroke-linecap="round" />
                                                        <text x="60" y="35" text-anchor="middle" font-size="8" fill="#9ca3af">Paper visible</text>
                                                    </svg>
                                                </div>
                                                <div class="example-text">
                                                    <small>✗ Background not removed<br>✗ Poor cropping<br>✗ Visible paper edges</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="signature-note">
                                    Remove background using <a href="https://www.remove.bg/" target="_blank">Remove.bg</a> for best results
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()">
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 9: Confirmation and Submit -->
            <div class="form-step" data-step="10">
                <div class="card-modern shadow border-0">
                    <div class="card-modern-header">
                        <h4 class="my-2">Step 10: Confirmation and Submit</h4>
                    </div>
                    <div class="card-modern-body">
                        <div class="alert alert-info">
                            <h5>Please review your information before submitting:</h5>
                            <div id="reviewData"></div>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="confirmSubmit"
                                required />
                            <label class="form-check-label" for="confirmSubmit">
                                I confirm that all the information provided is correct and I
                                want to submit my application.
                            </label>
                        </div>
                    </div>
                    <div class="card-modern-footer">
                        <button
                            type="button"
                            class="btn btn-secondary me-2"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="submit"
                            class="btn btn-success"
                            id="submitBtn"
                            disabled>
                            Submit Application
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script>
    let currentStep = 1;
    let emailVerified = false;
    let referenceVerified = false;
    let codeTimer = null;
    let timeLeft = 0;
    const CODE_EXPIRY_TIME = 60;

    // Initialize
    $(document).ready(function() {
        // Terms checkbox handler
        $("#agreeTerms").change(function() {
            $("#step1Next").prop("disabled", !this.checked);
        });

        $('#upazila').empty().html('<option value="">Select District First</option>');

        $.getJSON('place.json', function(data) {
            // When district changes, update upazila dropdown
            $('#district').on('change', function() {
                var selected = $(this).val();
                $('#upazila').html('<option value="">Select Upozila</option>');

                if (data[selected]) {
                    $.each(data[selected], function(index, upazila) {
                        $('#upazila').append('<option value="' + upazila + '">' + upazila + '</option>');
                    });
                }
            });
        });

        // Confirm submit checkbox handler
        $("#confirmSubmit").change(function() {
            $("#submitBtn").prop("disabled", !this.checked);
        });

        // Form submit handler
        $("#registrationForm").submit(function(e) {
            e.preventDefault();
            submitForm();
        });

        $('input[required], select[required]').on('input', function() {
            if ($(this).val().trim() !== '') {
                $(this).addClass('is-valid').removeClass('is-invalid');
            } else {
                $(this).removeClass('is-valid').addClass('is-invalid');
            }
        });

        //mobile no validation
        $('#personalMobile, #homeMobile').on('input', function() {
            const value = $(this).val();
            if (/^\d{11}$/.test(value)) {
                $(this).addClass('is-valid').removeClass('is-invalid');
            } else {
                $(this).removeClass('is-valid').addClass('is-invalid');
            }
        });

        //capitalize all input except email
        $('input[type="text"]').on('input', function() {
            const value = $(this).val();
            $(this).val(value.replace(/(^\w{1})|(\s+\w{1})/g, letter => letter.toUpperCase()));
        });
    });

    function loadfile(imgElement, event) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(imgElement).attr('src', e.target.result);
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function nextStep() {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
            updateProgressIndicator();
            if (currentStep === 9) {
                populateReviewData();
            }
        }
    }

    function prevStep() {
        currentStep--;
        showStep(currentStep);
        updateProgressIndicator();
    }

    function showStep(step) {
        $(".form-step").removeClass("active");
        $(`.form-step[data-step="${step}"]`).addClass("active");
    }

    function updateProgressIndicator() {
        const totalSteps = $(".step-indicator li").length;
        let currentStepName = "";

        // Update desktop indicator
        $(".step-indicator li").each(function(index) {
            const stepNum = index + 1;
            $(this).removeClass("active completed");
            if (stepNum < currentStep) {
                $(this).addClass("completed");
            } else if (stepNum === currentStep) {
                $(this).addClass("active");
                // Get the name of the current step for the mobile view
                currentStepName = $(this).data("step-name");
            }
        });

        // Update mobile indicator text
        $("#mobile-step-indicator").html(
            `Step ${currentStep} of ${totalSteps}: <strong>${currentStepName}</strong>`
        );
    }

    function validateStep(step) {
        const stepElement = $(`.form-step[data-step="${step}"]`);
        const requiredFields = stepElement.find(
            "input[required], select[required]"
        );
        let isValid = true;

        requiredFields.each(function() {
            if (!$(this).val()) {
                $(this).addClass("is-invalid");
                isValid = false;
            } else {
                $(this).addClass("is-valid");
            }
        });

        // Special validations
        if (step === 3 && !referenceVerified) {
            alert("Please verify your reference code first.");
            return false;
        }

        if (step === 4 && !emailVerified) {
            alert("Please verify your email address first.");
            return false;
        }

        return isValid;
    }

    function verifyReference() {
        const referenceCode = $("#referenceCode").val();
        if (!referenceCode) {
            alert("Please enter a reference code.");
            return;
        }

        $.ajax({
            url: "admin/join_us_action.php",
            method: "POST",
            data: {
                reference_code: referenceCode,
                action: "verify_reference"
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    $("#referenceStatus").html(
                        '<div class="status-message success">Reference verified successfully! ' + result.member + '</div>'
                    );
                    $("#step3Next").prop("disabled", false);
                    referenceVerified = true;
                    $('#verifyBtn').prop('disabled', true);
                } else {
                    $("#referenceStatus").html(
                        '<div class="status-message error">Invalid reference code. Please check and try again.</div>'
                    );
                    $("#step3Next").prop("disabled", true);
                    referenceVerified = false;
                }
            },
            error: function() {
                $("#referenceStatus").html(
                    '<div class="status-message success">Error verifying reference. Please try again.</div>'
                );
            },
        });
    }

    function sendVerificationCode() {
        const email = $('#email').val();
        if (!email) {
            alert('Please enter your email address.');
            return;
        }

        $('#sendCodeBtn').prop('disabled', true).text('Sending...');

        // Reset verification state
        emailVerified = false;
        $('#step4Next').prop('disabled', true);

        $.ajax({
            url: 'admin/join_us_action.php',
            method: 'POST',
            data: {
                email: email,
                action: 'send_verification_code'
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    $('#verificationSection').show();
                    $('#emailStatus').html('<div class="status-message success">' + result.message + '</div>');
                    $('#verificationCode').val('').removeClass('is-valid'); // Clear previous code
                    startTimer();
                    $('#sendCodeBtn').hide();
                } else {
                    $('#emailStatus').html('<div class="status-message error">Error sending verification code. Please try again.</div>');
                }
                $('#sendCodeBtn').prop('disabled', false).text('Send Verification Code');
            },
            error: function() {
                $('#emailStatus').html('<div class="status-message error">Error sending verification code. Please try again.</div>');
                $('#sendCodeBtn').prop('disabled', false).text('Send Verification Code');
            }
        });
    }

    function verifyEmail() {
        const email = $('#email').val();
        const code = $('#verificationCode').val();

        if (!code) {
            alert('Please enter the verification code.');
            return;
        }

        if (timeLeft <= 0) {
            $('#emailStatus').html('<div class="status-message error">Verification code has expired. Please request a new one.</div>');
            return;
        }

        $('#verifyBtn').prop('disabled', true).text('Verifying...');

        $.ajax({
            url: 'admin/join_us_action.php',
            method: 'POST',
            data: {
                email: email,
                code: code,
                action: 'verify_email'
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    $('#emailStatus').html('<div class="status-message success"><i class="fas fa-check-circle"></i> Email verified successfully!</div>');
                    $('#step4Next').prop('disabled', false);
                    emailVerified = true;
                    clearInterval(codeTimer);
                    $('#timerDisplay').hide();
                    $('#verificationSection input, #verificationSection button').prop('disabled', true);
                    $('#verifyBtn').prop('disabled', true).text('Verify Code');
                } else {
                    $('#emailStatus').html('<div class="status-message error">Invalid verification code. Please try again.</div>');
                    emailVerified = false;
                    $('#verifyBtn').prop('disabled', false).text('Verify Code');
                }
            },
            error: function() {
                $('#emailStatus').html('<div class="status-message error">Error verifying email. Please try again.</div>');
                $('#verifyBtn').prop('disabled', false).text('Verify Code');
            }
        });
    }

    function resendCode() {
        const email = $('#email').val();

        $('#resendBtn').prop('disabled', true).text('Resending...');

        $.ajax({
            url: 'admin/join_us_action.php',
            method: 'POST',
            data: {
                email: email,
                action: 'send_verification_code'
            },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    $('#emailStatus').html('<div class="status-message success">' + result.message + '</div>');
                    $('#verificationCode').val('').removeClass('is-valid'); // Clear previous code
                    $('#expiredText').hide();
                    $('#verifyBtn').prop('disabled', false);
                    startTimer();
                } else {
                    $('#emailStatus').html('<div class="status-message success">Error sending verification code. Please try again.</div>');
                }
                $('#resendBtn').prop('disabled', false).text('Resend Code');
            },
            error: function() {
                $('#emailStatus').html('<div class="status-message success">Error sending verification code. Please try again.</div>');
                $('#resendBtn').prop('disabled', false).text('Resend Code');
            }
        });
    }

    function startTimer() {
        timeLeft = CODE_EXPIRY_TIME;
        $('#timerDisplay').show();
        $('#expiredText').hide();
        $('#resendBtn').hide();

        codeTimer = setInterval(function() {
            timeLeft--;

            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            $('#timerDisplay').text(`Code expires in ${minutes}:${seconds.toString().padStart(2, '0')}`);

            if (timeLeft <= 0) {
                clearInterval(codeTimer);
                $('#timerDisplay').hide();
                $('#expiredText').show();
                $('#verifyBtn').prop('disabled', true);
                $('#resendBtn').show();
            }
        }, 1000);
    }

    function populateReviewData() {
        const reviewData = `
                <strong>Personal Information:</strong><br>
                Name: ${$("#firstName").val()} ${$("#lastName").val()} (${$("#nameBangla").val()})<br>
                Date of Birth: ${$("#dateOfBirth").val()}<br>
                Blood Group: ${$("#bloodGroup").val()}<br><br>
                
                <strong>Contact Information:</strong><br>
                Email: ${$("#email").val()}<br>
                Personal Mobile: ${$("#personalMobile").val()}<br>
                Home Mobile: ${$("#homeMobile").val()}<br><br>
                
                <strong>Address:</strong><br>
                ${$("#village").val()}, ${$("#upazila").val()}, ${$(
          "#district"
        ).val()}<br><br>
                
                <strong>Education:</strong><br>
                SSC Batch: ${$("#sscBatch").val()}<br>
                School: ${$("#sscSchool").val()}<br>
            `;
        $("#reviewData").html(reviewData);
    }

    function submitForm() {
        const formData = new FormData($("#registrationForm")[0]);

        $("#submitBtn").prop("disabled", true).text("Submitting...");

        $.ajax({
            url: "submit_registration.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                const result = JSON.parse(response);
                if (result.success) {
                    alert(
                        "Registration submitted successfully! You will receive a confirmation email shortly."
                    );
                    window.location.href = "index.php";
                } else {
                    alert("Error submitting registration: " + result.message);
                    $("#submitBtn")
                        .prop("disabled", false)
                        .text("Submit Application");
                }
            },
            error: function() {
                alert("Error submitting registration. Please try again.");
                $("#submitBtn").prop("disabled", false).text("Submit Application");
            },
        });
    }

    // Disable the next button initially
    $("#step1Next").prop("disabled", true);
    $("#step3Next").prop("disabled", true);
    $("#step4Next").prop("disabled", true);
    $("#submitBtn").prop("disabled", true);
    // Show the first step
    showStep(currentStep);
    // Update progress indicator
    updateProgressIndicator();
</script>

<?php
include 'footer.php';
?>

<script>
    document.getElementById('toggleLangBtn').addEventListener('click', function() {
        let isBangla = this.innerText === 'বাংলা'; // Check if the current language is Bangla

        // Toggle between showing the English and Bangla elements
        document.querySelectorAll('.en').forEach(function(element) {
            element.style.display = isBangla ? 'none' : 'inline';
        });
        document.querySelectorAll('.bn').forEach(function(element) {
            element.style.display = isBangla ? 'inline' : 'none';
        });

        // Toggle the button text
        this.innerText = isBangla ? 'English' : 'বাংলা';
    });
</script>

<script>
    function loadfile(imageId, event) {
        const file = event.target.files[0];
        const image = document.getElementById(imageId);
        const placeholder = imageId === 'preimage' ?
            document.getElementById('photo-placeholder') :
            document.getElementById('sign-placeholder');
        const info = imageId === 'preimage' ?
            document.getElementById('photo-info') :
            document.getElementById('sign-info');
        const filename = imageId === 'preimage' ?
            document.getElementById('photo-filename') :
            document.getElementById('sign-filename');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
                image.style.display = 'block';
                placeholder.style.display = 'none';
                info.style.display = 'block';
                filename.textContent = file.name;

                // Store filename for photo
                if (imageId === 'preimage') {
                    document.getElementById('photo_name').value = file.name;
                }
            };
            reader.readAsDataURL(file);
        }
    }

    // Drag and drop functionality
    document.querySelectorAll('.upload-zone').forEach(zone => {
        zone.addEventListener('dragover', (e) => {
            e.preventDefault();
            zone.classList.add('dragover');
        });

        zone.addEventListener('dragleave', (e) => {
            e.preventDefault();
            zone.classList.remove('dragover');
        });

        zone.addEventListener('drop', (e) => {
            e.preventDefault();
            zone.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                const input = zone.querySelector('input[type="file"]');
                input.files = files;

                // Trigger change event
                const event = new Event('change', {
                    bubbles: true
                });
                input.dispatchEvent(event);
            }
        });
    });

    // File validation
    document.getElementById('photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.size > 5 * 1024 * 1024) { // 5MB limit
            alert('File size must be less than 5MB');
            this.value = '';
            return;
        }
    });

    document.getElementById('sign').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file && file.size > 5 * 1024 * 1024) { // 5MB limit
            alert('File size must be less than 5MB');
            this.value = '';
            return;
        }
    });
</script>