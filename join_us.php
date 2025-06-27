<?php
include('admin/main.php');
$object = new batch_details();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Form</title>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        rel="stylesheet" />
    <style>
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
            border: 1px solid #dee2e6;
            padding: 15px;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <!-- Progress Indicator -->
        <div class="row mb-3">
            <div class="col-md-12">
                <!-- Mobile Indicator (simple text) -->
                <div id="mobile-step-indicator" class="text-center mb-3"></div>

                <!-- Desktop Indicator (connecting lines) -->
                <ol class="step-indicator">
                    <li class="active" data-step-name="Terms">
                        <div class="step-circle"><i class="fas fa-check"></i></div>
                        <span class="step-label">Terms</span>
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

        <form id="registrationForm" enctype="multipart/form-data">
            <!-- Step 1: Terms and Conditions -->
            <div class="form-step active" data-step="1">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 1: Terms and Conditions</h4>
                    </div>
                    <div class="card-body">
                        <div class="terms-text">
                            <h5>Membership Eligibility Requirements:</h5>
                            <ol>
                                <li>
                                    <strong>Educational Qualification:</strong> The primary
                                    requirement for becoming a member of Youth Save A Smile
                                    Foundation is to have participated in and successfully
                                    passed the SSC examination from any school.
                                </li>
                                <li>
                                    <strong>Membership Application:</strong> To obtain
                                    membership in the Youth Save A Smile Foundation, one must
                                    contact any regular member of the foundation and, with that
                                    member's recommendation, submit the necessary information in
                                    the designated membership form. The applicant must express
                                    their commitment to voluntary humanitarian service and sign
                                    accordingly, subject to the consideration of the President
                                    or General Secretary.
                                </li>
                                <li>
                                    <strong>Personal Qualities:</strong> Members must be
                                    courteous, tolerant, enthusiastic, humble, thoughtful, and
                                    responsible.
                                </li>
                                <li>
                                    <strong>Monthly Contribution:</strong> Each member must pay
                                    monthly dues as decided by the Executive Committee.
                                </li>
                                <li>
                                    <strong>Volunteer Spirit:</strong> Priority will be given to
                                    students who have a volunteer mindset, wish to contribute to
                                    the overall development of their batch and social
                                    development, are involved or willing to be involved in
                                    various creative works, and are not engaged in any immoral
                                    activities.
                                </li>
                                <li>
                                    <strong>Commitment to Excellence:</strong> Priority will be
                                    given to students who are committed to the maximum
                                    development of their talents and are interested in
                                    contributing to the development of their batch mates and
                                    humanity.
                                </li>
                            </ol>
                        </div>
                        <div class="form-check mt-3">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                id="agreeTerms"
                                required />
                            <label class="form-check-label" for="agreeTerms">
                                I agree to the terms and conditions of Save A Smile Foundation
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
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

            <!-- Step 2: Reference Code -->
            <div class="form-step" data-step="2">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 2: Reference Verification</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            Please enter the reference code provided by an existing member
                            of the foundation:
                        </p>
                        <div class="mb-3">
                            <label for="referenceCode" class="form-label">Reference Code *</label>
                            <input
                                type="text"
                                class="form-control"
                                id="referenceCode"
                                name="referenceCode"
                                placeholder="Enter the reference code got from a member"
                                required />
                            <div class="invalid-feedback" id="referenceError"></div>
                        </div>
                        <button
                            type="button"
                            class="btn btn-info text-white"
                            onclick="verifyReference()">
                            Verify Reference
                        </button>
                        <div id="referenceStatus" class="mt-2"></div>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            onclick="prevStep()">
                            Previous
                        </button>
                        <button
                            type="button"
                            class="btn btn-primary"
                            onclick="nextStep()"
                            id="step2Next"
                            disabled>
                            Next
                        </button>
                    </div>
                </div>
            </div>

            <!-- Step 3: Email Verification -->
            <div class="form-step" data-step="3">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 3: Email Verification</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address *</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your valid email address" required>
                        </div>
                        <button type="button" class="btn btn-info" onclick="sendVerificationCode()" id="sendCodeBtn">Send Verification Code</button>

                        <div id="verificationSection" style="display: none;" class="mt-3">
                            <div class="mb-3">
                                <label for="verificationCode" class="form-label">Verification Code *</label>
                                <input type="text" class="form-control" id="verificationCode" name="verificationCode" maxlength="6" placeholder="Enter 6-digit code">
                                <div class="form-text">
                                    <span id="timerDisplay" class="text-warning"></span>
                                    <span id="expiredText" class="text-danger" style="display: none;">Code expired. Please request a new one.</span>
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-success" onclick="verifyEmail()" id="verifyBtn">Verify Code</button>
                                <button type="button" class="btn btn-outline-secondary" onclick="resendCode()" id="resendBtn" style="display: none;">Resend Code</button>
                            </div>
                        </div>
                        <div id="emailStatus" class="mt-2"></div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-secondary" onclick="prevStep()">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep()" id="step3Next" disabled>Next</button>
                    </div>
                </div>
            </div>

            <!-- Step 4: Personal Details -->
            <div class="form-step" data-step="4">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 4: Personal Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="firstName"
                                        name="firstName"
                                        placeholder="Enter your first name"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="lastName"
                                        name="lastName"
                                        placeholder="Enter your last name"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nameBangla" class="form-label">নাম (বাংলা) *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="nameBangla"
                                        name="nameBangla"
                                        placeholder="আপনার নাম বাংলায় লিখুন"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="dateOfBirth" class="form-label">Date of Birth *</label>
                                    <input
                                        type="date"
                                        class="form-control"
                                        id="dateOfBirth"
                                        name="dateOfBirth"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="bloodGroup" class="form-label">Blood Group *</label>
                                    <select
                                        class="form-select"
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
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
            <div class="form-step" data-step="5">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 5: Parents Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="motherName" class="form-label">Mother's Name *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="motherName"
                                        name="motherName"
                                        placeholder="Enter your mother's name"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="motherProfession" class="form-label">Mother's Profession *</label>
                                    <select
                                        class="form-select"
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fatherName" class="form-label">Father's Name *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="fatherName"
                                        name="fatherName"
                                        placeholder="Enter your father's name"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fatherProfession" class="form-label">Father's Profession *</label>
                                    <select
                                        class="form-control"
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
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
            <div class="form-step" data-step="6">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 6: Address and Contact Information</h4>
                    </div>
                    <div class="card-body">
                        <h5>Permanent Address</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="district" class="form-label">District *</label>
                                    <select
                                        class="form-select"
                                        id="district"
                                        name="district"
                                        required
                                        onchange="loadUpazilas()">
                                        <option value="">Select District</option>
                                        <option value="Bandarban">Bandarban</option>
                                        <option value="Khagrachari">Khagrachari</option>
                                        <option value="Rangamati">Rangamati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="upazila" class="form-label">Upazila *</label>
                                    <select
                                        class="form-select"
                                        id="upazila"
                                        name="upazila"
                                        required>
                                        <option value="">Select Upazila</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="village" class="form-label">Village/Area *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="village"
                                        name="village"
                                        placeholder="Enter your village or area"
                                        required />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="personalMobile" class="form-label">Mobile No (Personal) *</label>
                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="personalMobile"
                                        name="personalMobile"
                                        placeholder="Enter your personal mobile number"
                                        required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="homeMobile" class="form-label">Mobile No (Home)</label>
                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="homeMobile"
                                        name="homeMobile"
                                        placeholder="Enter your home mobile number"
                                        required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
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
            <div class="form-step" data-step="7">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 7: Education Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sscBatch" class="form-label">SSC Batch *</label>
                                    <select
                                        class="form-select"
                                        id="sscBatch"
                                        name="sscBatch"
                                        required>
                                        <option value="">Select SSC Batch</option>
                                        <?php
                                        echo $object->fetch_batches(false);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sscSchool" class="form-label">SSC School *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="sscSchool"
                                        name="sscSchool"
                                        placeholder="Enter your SSC School Name"
                                        required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
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
            <div class="form-step" data-step="8">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 8: Upload Documents</h4>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="img/avatar.jpg" id="preimage" class="img-thumbnail mb-2" width="200">
                                    <input type="file" name="photo" id="photo" onchange="loadfile(preimage, event)" style="display: none;" required>
                                    <input type="hidden" name="photo_name" id="photo_name">
                                    <label for="photo" class="btn btn-primary btn-sm" style="cursor: pointer; width: 200px;">Select Picture</label>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                                <img src="img/signature_thumb.png" id="preimage2" class="border rounded mb-2" width="240" height="70">
                                <div class="text-danger" style="font-size: 12px;">* Remove background using <a href="https://www.remove.bg/">Remove Bg</a></div>
                                <input type="file" name="sign" id="sign" onchange="loadfile(preimage2, event)" style="display: none;" required>
                                <label for="sign" class="btn btn-primary btn-sm mt-2" style="cursor: pointer; width: 200px;">Select Sign</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
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
            <div class="form-step" data-step="9">
                <div class="card shadow border-0">
                    <div class="card-header">
                        <h4 class="my-2">Step 9: Confirmation and Submit</h4>
                    </div>
                    <div class="card-body">
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
                    <div class="card-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
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
            if (step === 2 && !referenceVerified) {
                alert("Please verify your reference code first.");
                return false;
            }

            if (step === 3 && !emailVerified) {
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
                            '<div class="alert alert-success">Reference verified successfully! ' + result.member + '</div>'
                        );
                        $("#step2Next").prop("disabled", false);
                        referenceVerified = true;
                    } else {
                        $("#referenceStatus").html(
                            '<div class="alert alert-danger">Invalid reference code. Please check and try again.</div>'
                        );
                        $("#step2Next").prop("disabled", true);
                        referenceVerified = false;
                    }
                },
                error: function() {
                    $("#referenceStatus").html(
                        '<div class="alert alert-danger">Error verifying reference. Please try again.</div>'
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
            $('#step3Next').prop('disabled', true);

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
                        $('#emailStatus').html('<div class="alert alert-success">' + result.message + '</div>');
                        $('#verificationCode').val(''); // Clear previous code
                        startTimer();
                        $('#sendCodeBtn').hide();
                    } else {
                        $('#emailStatus').html('<div class="alert alert-danger">Error sending verification code. Please try again.</div>');
                    }
                    $('#sendCodeBtn').prop('disabled', false).text('Send Verification Code');
                },
                error: function() {
                    $('#emailStatus').html('<div class="alert alert-danger">Error sending verification code. Please try again.</div>');
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
                $('#emailStatus').html('<div class="alert alert-danger">Verification code has expired. Please request a new one.</div>');
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
                        $('#emailStatus').html('<div class="alert alert-success"><i class="fas fa-check-circle"></i> Email verified successfully!</div>');
                        $('#step3Next').prop('disabled', false);
                        emailVerified = true;
                        clearInterval(codeTimer);
                        $('#timerDisplay').hide();
                        $('#verificationSection input, #verificationSection button').prop('disabled', true);
                        $('#verifyBtn').prop('disabled', true).text('Verify Code');
                    } else {
                        $('#emailStatus').html('<div class="alert alert-danger">Invalid verification code. Please try again.</div>');
                        emailVerified = false;
                        $('#verifyBtn').prop('disabled', false).text('Verify Code');
                    }
                },
                error: function() {
                    $('#emailStatus').html('<div class="alert alert-danger">Error verifying email. Please try again.</div>');
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
                        $('#emailStatus').html('<div class="alert alert-info">' + result.message + '</div>');
                        $('#verificationCode').val('');
                        $('#expiredText').hide();
                        $('#verifyBtn').prop('disabled', false);
                        startTimer();
                    } else {
                        $('#emailStatus').html('<div class="alert alert-danger">Error sending verification code. Please try again.</div>');
                    }
                    $('#resendBtn').prop('disabled', false).text('Resend Code');
                },
                error: function() {
                    $('#emailStatus').html('<div class="alert alert-danger">Error sending verification code. Please try again.</div>');
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
                Name: ${$("#fullName").val()} (${$("#nameBangla").val()})<br>
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
        $("#step2Next").prop("disabled", true);
        $("#step3Next").prop("disabled", true);
        $("#submitBtn").prop("disabled", true);
        // Show the first step
        showStep(currentStep);
        // Update progress indicator
        updateProgressIndicator();
    </script>
</body>

</html>