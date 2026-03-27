<?php
include 'db.php';

if ( isset( $_POST[ 'update' ] ) ) {

    function clean( $data ) {
        return htmlspecialchars( trim( $data ) );
    }

    // ===  ===  ===  ===  ===  == REQUIRED FIELDS ===  ===  ===  ===  ===  ==
    $id = intval( $_POST[ 'id' ] );
    $student_name = clean( $_POST[ 'student_name' ] ?? '' );
    $gender = clean( $_POST[ 'gender' ] ?? '' );
    $dob = clean( $_POST[ 'dob' ] ?? '' );
    $class_applying = clean( $_POST[ 'class_applying' ] ?? '' );

    // ===  ===  ===  ===  ===  == OPTIONAL FIELDS ===  ===  ===  ===  ===  ==
    $nationality = clean( $_POST[ 'nationality' ] ?? '' );
    $religion = clean( $_POST[ 'religion' ] ?? '' );
    $mother_tongue = clean( $_POST[ 'mother_tongue' ] ?? '' );
    $blood_group = strtoupper( clean( $_POST[ 'blood_group' ] ?? '' ) );
    $caste = clean( $_POST[ 'caste' ] ?? '' );
    $sub_caste = clean( $_POST[ 'sub_caste' ] ?? '' );
    $category = clean( $_POST[ 'category' ] ?? '' );
    $place_of_birth = clean( $_POST[ 'place_of_birth' ] ?? '' );
    $aadhar = clean( $_POST[ 'aadhar' ] ?? '' );
    $last_school = clean( $_POST[ 'last_school' ] ?? '' );
    $last_exam = clean( $_POST[ 'last_exam' ] ?? '' );
    $year = clean( $_POST[ 'year' ] ?? '' );
    $age = clean( $_POST[ 'age' ] ?? '' );
    $admission_class = clean( $_POST[ 'admission_class' ] ?? '' );
    $admission_date = clean( $_POST[ 'admission_date' ] ?? '' );
    $father_name = clean( $_POST[ 'father_name' ] ?? '' );
    $father_mobile = clean( $_POST[ 'father_mobile' ] ?? '' );
    $father_occupation = clean( $_POST[ 'father_occupation' ] ?? '' );
    $father_income = clean( $_POST[ 'father_income' ] ?? '' );
    $father_pan = strtoupper( clean( $_POST[ 'father_pan' ] ?? '' ) );
    $father_aadhar = clean( $_POST[ 'father_aadhar' ] ?? '' );
    $mother_name = clean( $_POST[ 'mother_name' ] ?? '' );
    $mother_mobile = clean( $_POST[ 'mother_mobile' ] ?? '' );
    $mother_occupation = clean( $_POST[ 'mother_occupation' ] ?? '' );
    $mother_income = clean( $_POST[ 'mother_income' ] ?? '' );
    $mother_pan = strtoupper( clean( $_POST[ 'mother_pan' ] ?? '' ) );
    $mother_aadhar = clean( $_POST[ 'mother_aadhar' ] ?? '' );
    $local_address = clean( $_POST[ 'local_address' ] ?? '' );
    $permanent_address = clean( $_POST[ 'permanent_address' ] ?? '' );

    // ===  ===  ===  ===  ===  == SERVER SIDE VALIDATION ===  ===  ===  ===  ===  ==
    $errors = [];

    if ( empty( $student_name ) ) $errors[] = 'Student name is required.';
    if ( empty( $gender ) ) $errors[] = 'Gender is required.';
    if ( empty( $dob ) ) $errors[] = 'Date of Birth is required.';
    if ( empty( $class_applying ) ) $errors[] = 'Class Applying is required.';

    if ( !empty( $aadhar ) && !preg_match( '/^[0-9]{12}$/', $aadhar ) ) {
        $errors[] = 'Student Aadhaar must be 12 digits.';
    }

    if ( !empty( $father_mobile ) && !preg_match( '/^[0-9]{10}$/', $father_mobile ) ) {
        $errors[] = 'Father mobile must be 10 digits.';
    }

    if ( !empty( $mother_mobile ) && !preg_match( '/^[0-9]{10}$/', $mother_mobile ) ) {
        $errors[] = 'Mother mobile must be 10 digits.';
    }

    if ( !empty( $father_pan ) && !preg_match( '/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $father_pan ) ) {
        $errors[] = 'Invalid Father PAN number.';
    }

    if ( !empty( $mother_pan ) && !preg_match( '/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/', $mother_pan ) ) {
        $errors[] = 'Invalid Mother PAN number.';
    }

    if ( !empty( $father_aadhar ) && !preg_match( '/^[0-9]{12}$/', $father_aadhar ) ) {
        $errors[] = 'Father Aadhaar must be 12 digits.';
    }

    if ( !empty( $mother_aadhar ) && !preg_match( '/^[0-9]{12}$/', $mother_aadhar ) ) {
        $errors[] = 'Mother Aadhaar must be 12 digits.';
    }

    if ( !empty( $year ) && !preg_match( '/^[0-9]{4}$/', $year ) ) {
        $errors[] = 'Year must be 4 digits.';
    }

    if ( !empty( $age ) && !preg_match( '/^[0-9]{1,2}$/', $age ) ) {
        $errors[] = 'Age must be valid.';
    }

    if ( !empty( $errors ) ) {
        echo "<script>alert('" . implode( '\\n', $errors ) . "'); window.history.back();</script>";
        exit;
    }

    // ===  ===  ===  ===  ===  == UPDATE QUERY ===  ===  ===  ===  ===  ==
    $stmt = $conn->prepare( "UPDATE admissions SET 
        student_name = ?, 
        gender = ?, 
        dob = ?, 
        class_applying = ?, 
        nationality = ?, 
        religion = ?, 
        mother_tongue = ?, 
        blood_group = ?, 
        caste = ?, 
        sub_caste = ?, 
        category = ?, 
        place_of_birth = ?, 
        aadhar = ?, 
        last_school = ?, 
        last_exam = ?, 
        year = ?, 
        age = ?, 
        admission_class = ?, 
        admission_date = ?, 
        father_name = ?, 
        father_mobile = ?, 
        father_occupation = ?, 
        father_income = ?, 
        father_pan = ?, 
        father_aadhar = ?, 
        mother_name = ?, 
        mother_mobile = ?, 
        mother_occupation = ?, 
        mother_income = ?, 
        mother_pan = ?, 
        mother_aadhar = ?, 
        local_address = ?, 
        permanent_address = ?
        WHERE id = ?" );

    if ( !$stmt ) {
        die( 'Prepare failed: ' . $conn->error );
    }

    $stmt->bind_param(
        'sssssssssssssssssssssssssssssssssi',
        $student_name,
        $gender,
        $dob,
        $class_applying,
        $nationality,
        $religion,
        $mother_tongue,
        $blood_group,
        $caste,
        $sub_caste,
        $category,
        $place_of_birth,
        $aadhar,
        $last_school,
        $last_exam,
        $year,
        $age,
        $admission_class,
        $admission_date,
        $father_name,
        $father_mobile,
        $father_occupation,
        $father_income,
        $father_pan,
        $father_aadhar,
        $mother_name,
        $mother_mobile,
        $mother_occupation,
        $mother_income,
        $mother_pan,
        $mother_aadhar,
        $local_address,
        $permanent_address,
        $id
    );

    if ( $stmt->execute() ) {
        echo "<script>alert('Record Updated Successfully!'); window.location='view_admissions.php';</script>";
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid Request'); window.location='view_admissions.php';</script>";
}
?>