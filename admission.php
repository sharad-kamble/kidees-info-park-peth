<?php
include 'db.php';
session_start();
?>

<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>

<div class='container mt-5'>
    <div class='card p-4 shadow'>

        <h4>Student Admission Form</h4>

        <form method='POST'>

            <!-- Student Info -->
            <input type='text' name='student_name' class='form-control mb-3' placeholder='Student Name' required>

            <select name='gender' class='form-control mb-3'>
                <option value=''>Select Gender</option>
                <option>Male</option>
                <option>Female</option>
            </select>

            <input type='date' name='dob' class='form-control mb-3'>

            <select name='class_apply' class='form-control mb-3'>
                <option value=''>Select Class</option>
                <option>5th</option>
                <option>6th</option>
                <option>7th</option>
                <option>8th</option>
                <option>9th</option>
                <option>10th</option>
            </select>

            <!-- Personal -->
            <input type='text' name='nationality' class='form-control mb-3' placeholder='Nationality'>
            <input type='text' name='religion' class='form-control mb-3' placeholder='Religion'>
            <input type='text' name='mother_tongue' class='form-control mb-3' placeholder='Mother Tongue'>
            <input type='text' name='blood_group' class='form-control mb-3' placeholder='Blood Group'>
            <input type='text' name='caste' class='form-control mb-3' placeholder='Caste'>
            <input type='text' name='sub_caste' class='form-control mb-3' placeholder='Sub Caste'>
            <input type='text' name='category' class='form-control mb-3' placeholder='Category'>
            <input type='text' name='place_of_birth' class='form-control mb-3' placeholder='Place of Birth'>
            <input type='text' name='aadhar' class='form-control mb-3' placeholder='Aadhar Number'>

            <!-- Admission -->
            <input type='text' name='last_school' class='form-control mb-3' placeholder='Last School'>
            <input type='text' name='last_exam' class='form-control mb-3' placeholder='Last Exam'>
            <input type='text' name='exam_year' class='form-control mb-3' placeholder='Year'>
            <input type='text' name='age' class='form-control mb-3' placeholder='Age'>
            <input type='text' name='admission_class' class='form-control mb-3' placeholder='Admission Class'>
            <input type='date' name='admission_date' class='form-control mb-3'>

            <!-- Father -->
            <input type='text' name='father_name' class='form-control mb-3' placeholder='Father Name'>
            <input type='text' name='father_mobile' class='form-control mb-3' placeholder='Father Mobile'>
            <input type='text' name='father_occupation' class='form-control mb-3' placeholder='Occupation'>
            <input type='text' name='father_income' class='form-control mb-3' placeholder='Income'>
            <input type='text' name='father_pan' class='form-control mb-3' placeholder='PAN'>
            <input type='text' name='father_aadhar' class='form-control mb-3' placeholder='Aadhar'>

            <!-- Mother -->
            <input type='text' name='mother_name' class='form-control mb-3' placeholder='Mother Name'>
            <input type='text' name='mother_mobile' class='form-control mb-3' placeholder='Mother Mobile'>
            <input type='text' name='mother_occupation' class='form-control mb-3' placeholder='Occupation'>
            <input type='text' name='mother_income' class='form-control mb-3' placeholder='Income'>
            <input type='text' name='mother_pan' class='form-control mb-3' placeholder='PAN'>
            <input type='text' name='mother_aadhar' class='form-control mb-3' placeholder='Aadhar'>

            <!-- Address -->
            <textarea name='local_address' class='form-control mb-3' placeholder='Local Address'></textarea>
            <textarea name='permanent_address' class='form-control mb-3' placeholder='Permanent Address'></textarea>

            <button name='submit' class='btn btn-primary'>Submit Admission</button>

        </form>
    </div>
</div>

<?php
if ( isset( $_POST[ 'submit' ] ) ) {

    $student_name = $_POST[ 'student_name' ];
    $gender = $_POST[ 'gender' ];
    $dob = $_POST[ 'dob' ];
    $class_apply = $_POST[ 'class_apply' ];

    $nationality = $_POST[ 'nationality' ];
    $religion = $_POST[ 'religion' ];
    $mother_tongue = $_POST[ 'mother_tongue' ];
    $blood_group = $_POST[ 'blood_group' ];
    $caste = $_POST[ 'caste' ];
    $sub_caste = $_POST[ 'sub_caste' ];
    $category = $_POST[ 'category' ];
    $place_of_birth = $_POST[ 'place_of_birth' ];
    $aadhar = $_POST[ 'aadhar' ];

    $last_school = $_POST[ 'last_school' ];
    $last_exam = $_POST[ 'last_exam' ];
    $exam_year = $_POST[ 'exam_year' ];
    $age = $_POST[ 'age' ];
    $admission_class = $_POST[ 'admission_class' ];
    $admission_date = $_POST[ 'admission_date' ];

    $father_name = $_POST[ 'father_name' ];
    $father_mobile = $_POST[ 'father_mobile' ];
    $father_occupation = $_POST[ 'father_occupation' ];
    $father_income = $_POST[ 'father_income' ];
    $father_pan = $_POST[ 'father_pan' ];
    $father_aadhar = $_POST[ 'father_aadhar' ];

    $mother_name = $_POST[ 'mother_name' ];
    $mother_mobile = $_POST[ 'mother_mobile' ];
    $mother_occupation = $_POST[ 'mother_occupation' ];
    $mother_income = $_POST[ 'mother_income' ];
    $mother_pan = $_POST[ 'mother_pan' ];
    $mother_aadhar = $_POST[ 'mother_aadhar' ];

    $local_address = $_POST[ 'local_address' ];
    $permanent_address = $_POST[ 'permanent_address' ];

    mysqli_query( $conn, "INSERT INTO admissions(
student_name,gender,dob,class_apply,
nationality,religion,mother_tongue,blood_group,caste,sub_caste,category,place_of_birth,aadhar,
last_school,last_exam,exam_year,age,admission_class,admission_date,
father_name,father_mobile,father_occupation,father_income,father_pan,father_aadhar,
mother_name,mother_mobile,mother_occupation,mother_income,mother_pan,mother_aadhar,
local_address,permanent_address
) VALUES (
'$student_name','$gender','$dob','$class_apply',
'$nationality','$religion','$mother_tongue','$blood_group','$caste','$sub_caste','$category','$place_of_birth','$aadhar',
'$last_school','$last_exam','$exam_year','$age','$admission_class','$admission_date',
'$father_name','$father_mobile','$father_occupation','$father_income','$father_pan','$father_aadhar',
'$mother_name','$mother_mobile','$mother_occupation','$mother_income','$mother_pan','$mother_aadhar',
'$local_address','$permanent_address'
)" );

    echo "<div class='alert alert-success mt-3'>Admission Added Successfully</div>";
}
?>