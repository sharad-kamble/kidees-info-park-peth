<?php
include 'db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid ID");
}

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM admissions WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!$row) {
    die("Record not found");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admission</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mb-5 mt-4">
        <div class="card shadow border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="text-center fw-bold mb-4">Edit Admission</h2>

                <form action="update_admission.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <!-- ================= Student Information ================= -->
                    <div class="card shadow-sm border rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Student Information</h5>
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <label class="form-label">Student Full Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="student_name" class="form-control"
                                        value="<?= htmlspecialchars($row['student_name']); ?>" required>
                                    <div class="invalid-feedback">Please enter student name.</div>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Gender <span class="text-danger">*</span></label>
                                    <select class="form-select" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male" <?= ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male
                                        </option>
                                        <option value="Female" <?= ($row['gender'] == 'Female') ? 'selected' : ''; ?>>
                                            Female</option>
                                    </select>
                                    <div class="invalid-feedback">Please select gender.</div>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control" value="<?= $row['dob']; ?>"
                                        required>
                                    <div class="invalid-feedback">Please select DOB.</div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Class Applying For <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" name="class_applying" required>
                                        <option value="">Select Class</option>
                                        <option value="5th Standard"
                                            <?= ($row['class_applying'] == '5th Standard') ? 'selected' : ''; ?>>5th
                                            Standard</option>
                                        <option value="6th Standard"
                                            <?= ($row['class_applying'] == '6th Standard') ? 'selected' : ''; ?>>6th
                                            Standard</option>
                                        <option value="7th Standard"
                                            <?= ($row['class_applying'] == '7th Standard') ? 'selected' : ''; ?>>7th
                                            Standard</option>
                                        <option value="8th Standard"
                                            <?= ($row['class_applying'] == '8th Standard') ? 'selected' : ''; ?>>8th
                                            Standard</option>
                                        <option value="9th Standard"
                                            <?= ($row['class_applying'] == '9th Standard') ? 'selected' : ''; ?>>9th
                                            Standard</option>
                                        <option value="10th Standard"
                                            <?= ($row['class_applying'] == '10th Standard') ? 'selected' : ''; ?>>10th
                                            Standard</option>
                                    </select>
                                    <div class="invalid-feedback">Please select class.</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= Personal Details ================= -->
                    <div class="card shadow-sm border rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Personal Details</h5>
                            <div class="row g-4">

                                <div class="col-md-3">
                                    <label class="form-label">Nationality</label>
                                    <input type="text" name="nationality" class="form-control"
                                        value="<?= htmlspecialchars($row['nationality']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Religion</label>
                                    <input type="text" name="religion" class="form-control"
                                        value="<?= htmlspecialchars($row['religion']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Mother Tongue</label>
                                    <input type="text" name="mother_tongue" class="form-control"
                                        value="<?= htmlspecialchars($row['mother_tongue']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Blood Group</label>
                                    <input type="text" name="blood_group" class="form-control"
                                        value="<?= htmlspecialchars($row['blood_group']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Caste</label>
                                    <input type="text" name="caste" class="form-control"
                                        value="<?= htmlspecialchars($row['caste']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Sub-caste</label>
                                    <input type="text" name="sub_caste" class="form-control"
                                        value="<?= htmlspecialchars($row['sub_caste']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Category</label>
                                    <input type="text" name="category" class="form-control"
                                        value="<?= htmlspecialchars($row['category']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Place of Birth</label>
                                    <input type="text" name="place_of_birth" class="form-control"
                                        value="<?= htmlspecialchars($row['place_of_birth']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Aadhaar Number</label>
                                    <input type="text" name="aadhar" class="form-control number-only" maxlength="12"
                                        inputmode="numeric" pattern="[0-9]{12}"
                                        value="<?= htmlspecialchars($row['aadhar']); ?>">
                                    <div class="invalid-feedback">Enter valid 12-digit Aadhaar.</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= Admission Details ================= -->
                    <div class="card shadow-sm border rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Admission Details</h5>
                            <div class="row g-4">

                                <div class="col-md-6">
                                    <label class="form-label">Last School Attended</label>
                                    <input type="text" name="last_school" class="form-control"
                                        value="<?= htmlspecialchars($row['last_school']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Last Exam Taken</label>
                                    <input type="text" name="last_exam" class="form-control"
                                        value="<?= htmlspecialchars($row['last_exam']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Year of Passing</label>
                                    <input type="text" name="year" class="form-control number-only" maxlength="4"
                                        inputmode="numeric" pattern="[0-9]{4}"
                                        value="<?= htmlspecialchars($row['year']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Age</label>
                                    <input type="number" name="age" class="form-control" min="1" max="25"
                                        value="<?= htmlspecialchars($row['age']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Admission for Class</label>
                                    <input type="text" name="admission_class" class="form-control"
                                        value="<?= htmlspecialchars($row['admission_class']); ?>">
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Date of Admission</label>
                                    <input type="date" name="admission_date" class="form-control"
                                        value="<?= $row['admission_date']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= Father Details ================= -->
                    <div class="card shadow-sm border rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Father's Details</h5>
                            <div class="row g-4">

                                <div class="col-md-4">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control"
                                        value="<?= htmlspecialchars($row['father_name']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" name="father_mobile" class="form-control number-only"
                                        maxlength="10" inputmode="numeric" pattern="[0-9]{10}"
                                        value="<?= htmlspecialchars($row['father_mobile']); ?>">
                                    <div class="invalid-feedback">Enter valid 10-digit mobile number.</div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="father_occupation" class="form-control"
                                        value="<?= htmlspecialchars($row['father_occupation']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Annual Income</label>
                                    <input type="text" name="father_income" class="form-control number-only"
                                        inputmode="numeric" value="<?= htmlspecialchars($row['father_income']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">PAN Number</label>
                                    <input type="text" name="father_pan" class="form-control text-uppercase"
                                        value="<?= htmlspecialchars($row['father_pan']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Aadhaar Number</label>
                                    <input type="text" name="father_aadhar" class="form-control number-only"
                                        maxlength="12" inputmode="numeric" pattern="[0-9]{12}"
                                        value="<?= htmlspecialchars($row['father_aadhar']); ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= Mother Details ================= -->
                    <div class="card shadow-sm border rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Mother's Details</h5>
                            <div class="row g-4">

                                <div class="col-md-4">
                                    <label class="form-label">Mother's Name</label>
                                    <input type="text" name="mother_name" class="form-control"
                                        value="<?= htmlspecialchars($row['mother_name']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" name="mother_mobile" class="form-control number-only"
                                        maxlength="10" inputmode="numeric" pattern="[0-9]{10}"
                                        value="<?= htmlspecialchars($row['mother_mobile']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Occupation</label>
                                    <input type="text" name="mother_occupation" class="form-control"
                                        value="<?= htmlspecialchars($row['mother_occupation']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Annual Income</label>
                                    <input type="text" name="mother_income" class="form-control number-only"
                                        inputmode="numeric" value="<?= htmlspecialchars($row['mother_income']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">PAN Number</label>
                                    <input type="text" name="mother_pan" class="form-control text-uppercase"
                                        value="<?= htmlspecialchars($row['mother_pan']); ?>">
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Aadhaar Number</label>
                                    <input type="text" name="mother_aadhar" class="form-control number-only"
                                        maxlength="12" inputmode="numeric" pattern="[0-9]{12}"
                                        value="<?= htmlspecialchars($row['mother_aadhar']); ?>">
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- ================= Address ================= -->
                    <div class="card shadow-sm border rounded-3 mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-4">Address Details</h5>

                            <div class="mb-3">
                                <label class="form-label">Local Address</label>
                                <textarea name="local_address" class="form-control"
                                    rows="2"><?= htmlspecialchars($row['local_address']); ?></textarea>
                            </div>

                            <div>
                                <label class="form-label">Permanent Address</label>
                                <textarea name="permanent_address" class="form-control"
                                    rows="2"><?= htmlspecialchars($row['permanent_address']); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" name="update" class="btn btn-success px-5">Update Record</button>
                        <a href="view_admissions.php" class="btn btn-secondary px-5">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
    (() => {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Only numbers allowed
    document.querySelectorAll('.number-only').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, this.maxLength > 0 ? this
                .maxLength : 999);
        });
    });

    // Auto uppercase for PAN
    document.querySelectorAll('.text-uppercase').forEach(input => {
        input.addEventListener('input', function() {
            this.value = this.value.toUpperCase();
        });
    });
    </script>

</body>

</html>