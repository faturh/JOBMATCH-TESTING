@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header text-center">Register for JobMatch</div>
            <div class="card-body">
                <!-- Notifikasi Success atau Error -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Formulir Registrasi -->
                <form action="{{ route('register.applicant.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Accordion: Personal Data -->
                    <div class="accordion" id="personalDataAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePersonalData" aria-expanded="true" aria-controls="collapsePersonalData">
                                    Personal Data
                                </button>
                            </h2>
                            <div id="collapsePersonalData" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#personalDataAccordion">
                                <div class="accordion-body">
                                    <!-- Input Fields for Personal Data -->
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" id="role" name="role" required>
                                            <option value="applicant">Applicant</option>
                                            <option value="company">Company</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Date Of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cv" class="form-label">CV</label>
                                        <input type="file" class="form-control" id="cv" name="cv" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="portfolio" class="form-label">Portfolio</label>
                                        <input type="file" class="form-control" id="portfolio" name="portfolio" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion: Experience & Education -->
                    <div class="accordion" id="experienceEducationAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExperienceEducation" aria-expanded="false" aria-controls="collapseExperienceEducation">
                                    Experience & Education
                                </button>
                            </h2>
                            <div id="collapseExperienceEducation" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#experienceEducationAccordion">
                                <div class="accordion-body">
                                    <!-- Input Fields for Education -->
                                    <div class="mb-3">
                                        <label for="institution" class="form-label">Institution</label>
                                        <input type="text" class="form-control" id="institution" name="institution" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="major" class="form-label">Major</label>
                                        <input type="text" class="form-control" id="major" name="major" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="graduation_year" class="form-label">Graduation Year</label>
                                        <input type="number" class="form-control" id="graduation_year" name="graduation_year" required>
                                    </div>

                                    <!-- Input Fields for Work Experience -->
                                    <div class="mb-3">
                                        <label for="work_company" class="form-label">Company</label>
                                        <input type="text" class="form-control" id="work_company" name="work_company">
                                    </div>
                                    <div class="mb-3">
                                        <label for="work_position" class="form-label">Position</label>
                                        <input type="text" class="form-control" id="work_position" name="work_position">
                                    </div>
                                    <div class="mb-3">
                                        <label for="work_description" class="form-label">Description</label>
                                        <textarea class="form-control" id="work_description" name="work_description" rows="3"></textarea>
                                    </div>

                                    <!-- Input Fields for Skills -->
                                    <div class="mb-3">
                                        <label for="soft_skills" class="form-label">Soft Skills</label>
                                        <input type="text" class="form-control" id="soft_skills" name="soft_skills">
                                    </div>
                                    <div class="mb-3">
                                        <label for="hard_skills" class="form-label">Hard Skills</label>
                                        <input type="text" class="form-control" id="hard_skills" name="hard_skills">
                                    </div>
                                    <div class="mb-3">
                                        <label for="certification" class="form-label">Certification</label>
                                        <input type="file" class="form-control" id="certification" name="certification">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion: Desired Job -->
                    <div class="accordion" id="desiredJobAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDesiredJob" aria-expanded="false" aria-controls="collapseDesiredJob">
                                    Desired Job
                                </button>
                            </h2>
                            <div id="collapseDesiredJob" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#desiredJobAccordion">
                                <div class="accordion-body">
                                    <!-- Input Fields for Desired Job -->
                                    <div class="mb-3">
                                        <label for="desired_position" class="form-label">Desired Job Position</label>
                                        <input type="text" class="form-control" id="desired_position" name="desired_position" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="type_of_work" class="form-label">Type of Work</label>
                                        <input type="text" class="form-control" id="type_of_work" name="type_of_work" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="location" class="form-label">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="salary_min" class="form-label">Salary Min</label>
                                        <input type="number" class="form-control" id="salary_min" name="salary_min" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="salary_max" class="form-label">Salary Max</label>
                                        <input type="number" class="form-control" id="salary_max" name="salary_max" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="availability_date" class="form-label">Availability Date</label>
                                        <input type="date" class="form-control" id="availability_date" name="availability_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="available_now" class="form-label">Available Now</label>
                                        <input type="checkbox" id="available_now" name="available_now">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script to Toggle Accordion -->
<script>
    document.getElementById('role').addEventListener('change', function () {
        var role = this.value;
        if (role === 'company') {
            document.getElementById('companyData').style.display = 'block';
        } else {
            document.getElementById('companyData').style.display = 'none';
        }
    });
</script>

@endsection
