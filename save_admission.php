<?php
include 'db.php';

if ( isset( $_POST[ 'submit' ] ) ) {

    function clean( $data ) {
        return htmlspecialchars( trim( $data ) );
    }

    // ===  ===  ===  ===  ===  == Collect Data ===  ===  ===  ===  ===  ==
    $student_name      = clean( $_POST[ 'student_name' ] ?? '' );
    $gender            = clean( $_POST[ 'gender' ] ?? '' );
    $dob               = clean( $_POST[ 'dob' ] ?? '' );
    $class_applying    = clean( $_POST[ 'class_applying' ] ?? '' );
    $nationality       = clean( $_POST[ 'nationality' ] ?? '' );
    $religion          = clean( $_POST[ 'religion' ] ?? '' );
    $mother_tongue     = clean( $_POST[ 'mother_tongue' ] ?? '' );
    $blood_group       = strtoupper( clean( $_POST[ 'blood_group' ] ?? '' ) );
    $caste             = clean( $_POST[ 'caste' ] ?? '' );
    $sub_caste         = clean( $_POST[ 'sub_caste' ] ?? '' );
    $category          = clean( $_POST[ 'category' ] ?? '' );
    $place_of_birth    = clean( $_POST[ 'place_of_birth' ] ?? '' );
    $aadhar            = clean( $_POST[ 'aadhar' ] ?? '' );
    $last_school       = clean( $_POST[ 'last_school' ] ?? '' );
    $last_exam         = clean( $_POST[ 'last_exam' ] ?? '' );
    $year              = clean( $_POST[ 'year' ] ?? '' );
    $age               = clean( $_POST[ 'age' ] ?? '' );
    $admission_class   = clean( $_POST[ 'admission_class' ] ?? '' );
    $admission_date    = clean( $_POST[ 'admission_date' ] ?? '' );
    $father_name       = clean( $_POST[ 'father_name' ] ?? '' );
    $father_mobile     = clean( $_POST[ 'father_mobile' ] ?? '' );
    $father_occupation = clean( $_POST[ 'father_occupation' ] ?? '' );
    $father_income     = clean( $_POST[ 'father_income' ] ?? '' );
    $father_pan        = strtoupper( clean( $_POST[ 'father_pan' ] ?? '' ) );
    $father_aadhar     = clean( $_POST[ 'father_aadhar' ] ?? '' );
    $mother_name       = clean( $_POST[ 'mother_name' ] ?? '' );
    $mother_mobile     = clean( $_POST[ 'mother_mobile' ] ?? '' );
    $mother_occupation = clean( $_POST[ 'mother_occupation' ] ?? '' );
    $mother_income     = clean( $_POST[ 'mother_income' ] ?? '' );
    $mother_pan        = strtoupper( clean( $_POST[ 'mother_pan' ] ?? '' ) );
    $mother_aadhar     = clean( $_POST[ 'mother_aadhar' ] ?? '' );
    $local_address     = clean( $_POST[ 'local_address' ] ?? '' );
    $permanent_address = clean( $_POST[ 'permanent_address' ] ?? '' );

    $errors = [];

    // ===  ===  ===  ===  ===  == Required Field Validation ===  ===  ===  ===  ===  ==
    if ( empty( $student_name ) ) {
        $errors[] = 'Student Name is required.';
    }

    if ( empty( $gender ) ) {
        $errors[] = 'Gender is required.';
    }

    if ( empty( $dob ) ) {
        $errors[] = 'Date of Birth is required.';
    }

    if ( empty( $class_applying ) ) {
        $errors[] = 'Class Applying For is required.';
    }

    // ===  ===  ===  ===  ===  == Format Validation ===  ===  ===  ===  ===  ==
    if ( !empty( $student_name ) && !preg_match( "/^[a-zA-Z\s]+$/", $student_name ) ) {
        $errors[] = 'Student Name should contain only letters.';
    }

    if ( !empty( $nationality ) && !preg_match( "/^[a-zA-Z\s]+$/", $nationality ) ) {
        $errors[] = 'Nationality should contain only letters.';
    }

    if ( !empty( $religion ) && !preg_match( "/^[a-zA-Z\s]+$/", $religion ) ) {
        $errors[] = 'Religion should contain only letters.';
    }

    if ( !empty( $mother_tongue ) && !preg_match( "/^[a-zA-Z\s]+$/", $mother_tongue ) ) {
        $errors[] = 'Mother Tongue should contain only letters.';
    }

    if ( !empty( $caste ) && !preg_match( "/^[a-zA-Z\s]+$/", $caste ) ) {
        $errors[] = 'Caste should contain only letters.';
    }

    if ( !empty( $sub_caste ) && !preg_match( "/^[a-zA-Z\s]+$/", $sub_caste ) ) {
        $errors[] = 'Sub-caste should contain only letters.';
    }

    if ( !empty( $category ) && !preg_match( "/^[a-zA-Z\s]+$/", $category ) ) {
        $errors[] = 'Category should contain only letters.';
    }

    if ( !empty( $place_of_birth ) && !preg_match( "/^[a-zA-Z\s]+$/", $place_of_birth ) ) {
        $errors[] = 'Place of Birth should contain only letters.';
    }

    if ( !empty( $father_name ) && !preg_match( "/^[a-zA-Z\s]+$/", $father_name ) ) {
        $errors[] = 'Father Name should contain only letters.';
    }

    if ( !empty( $mother_name ) && !preg_match( "/^[a-zA-Z\s]+$/", $mother_name ) ) {
        $errors[] = 'Mother Name should contain only letters.';
    }

    if ( !empty( $father_occupation ) && !preg_match( "/^[a-zA-Z\s]+$/", $father_occupation ) ) {
        $errors[] = 'Father Occupation should contain only letters.';
    }

    if ( !empty( $mother_occupation ) && !preg_match( "/^[a-zA-Z\s]+$/", $mother_occupation ) ) {
        $errors[] = 'Mother Occupation should contain only letters.';
    }

    // Aadhaar Validation
    if ( !empty( $aadhar ) && !preg_match( "/^[0-9]{12}$/", $aadhar ) ) {
        $errors[] = 'Student Aadhaar must be 12 digits.';
    }

    if ( !empty( $father_aadhar ) && !preg_match( "/^[0-9]{12}$/", $father_aadhar ) ) {
        $errors[] = 'Father Aadhaar must be 12 digits.';
    }

    if ( !empty( $mother_aadhar ) && !preg_match( "/^[0-9]{12}$/", $mother_aadhar ) ) {
        $errors[] = 'Mother Aadhaar must be 12 digits.';
    }

    // Mobile Validation
    if ( !empty( $father_mobile ) && !preg_match( "/^[0-9]{10}$/", $father_mobile ) ) {
        $errors[] = 'Father Mobile must be 10 digits.';
    }

    if ( !empty( $mother_mobile ) && !preg_match( "/^[0-9]{10}$/", $mother_mobile ) ) {
        $errors[] = 'Mother Mobile must be 10 digits.';
    }

    // PAN Validation
    if ( !empty( $father_pan ) && !preg_match( "/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", $father_pan ) ) {
        $errors[] = 'Father PAN format is invalid.';
    }

    if ( !empty( $mother_pan ) && !preg_match( "/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/", $mother_pan ) ) {
        $errors[] = 'Mother PAN format is invalid.';
    }

    // Year Validation
    if ( !empty( $year ) && !preg_match( "/^[0-9]{4}$/", $year ) ) {
        $errors[] = 'Year of Passing must be 4 digits.';
    }

    // Age Validation
    if ( !empty( $age ) && !preg_match( "/^[0-9]{1,2}$/", $age ) ) {
        $errors[] = 'Age must be 1 or 2 digits only.';
    }

    // Income Validation
    if ( !empty( $father_income ) && !is_numeric( $father_income ) ) {
        $errors[] = 'Father Income must be numeric.';
    }

    if ( !empty( $mother_income ) && !is_numeric( $mother_income ) ) {
        $errors[] = 'Mother Income must be numeric.';
    }

    // ===  ===  ===  ===  ===  == If Errors Found ===  ===  ===  ===  ===  ==
    if ( !empty( $errors ) ) {
        echo "<script>alert('" . implode( '\\n', $errors ) . "'); window.history.back();</script>";
        exit;
    }

    // ===  ===  ===  ===  ===  == Insert Data ===  ===  ===  ===  ===  ==
    $stmt = $conn->prepare( "INSERT INTO admissions (
        student_name, gender, dob, class_applying,
        nationality, religion, mother_tongue, blood_group, caste, sub_caste, category, place_of_birth, aadhar,
        last_school, last_exam, year, age, admission_class, admission_date,
        father_name, father_mobile, father_occupation, father_income, father_pan, father_aadhar,
        mother_name, mother_mobile, mother_occupation, mother_income, mother_pan, mother_aadhar,
        local_address, permanent_address
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" );

    $stmt->bind_param(
        'sssssssssssssssssssssssssssssssss',
        $student_name, $gender, $dob, $class_applying,
        $nationality, $religion, $mother_tongue, $blood_group, $caste, $sub_caste, $category, $place_of_birth, $aadhar,
        $last_school, $last_exam, $year, $age, $admission_class, $admission_date,
        $father_name, $father_mobile, $father_occupation, $father_income, $father_pan, $father_aadhar,
        $mother_name, $mother_mobile, $mother_occupation, $mother_income, $mother_pan, $mother_aadhar,
        $local_address, $permanent_address
    );

    if ( $stmt->execute() ) {
        echo "<script>alert('Admission Saved Successfully!'); window.location='view_admissions.php';</script>";
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header( 'Location: admission_form.php' );
    exit;
}
?>