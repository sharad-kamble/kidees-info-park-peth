<?php include 'db.php'; ?>

<!-- Bootstrap + Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
.card:hover {
    transform: translateY(-6px);
    transition: 0.3s ease;
}

.quote-icon {
    font-size: 18px;
    color: #0d6efd;
    margin-right: 5px;
}
</style>

<section class="py-5 bg-light">
    <div class="container">

        <!-- Heading -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">What Parents Say</h2>
            <p class="text-muted">Trusted by our happy parents about Kidees Info Park</p>
        </div>

        <!-- DATA LOAD -->
        <div class="row g-4" id="testimonialData"></div>

        <!-- PAGINATION -->
        <div class="text-center mt-4">
            <?php
            $limit = 6;
            $total = mysqli_query($conn,"SELECT COUNT(*) as count FROM testimonials");
            $row = mysqli_fetch_assoc($total);
            $pages = ceil($row['count'] / $limit);

            for($i=1; $i<=$pages; $i++){
            ?>
            <button class="btn btn-outline-primary btn-sm test-btn" data-page="<?php echo $i; ?>">
                <?php echo $i; ?>
            </button>
            <?php } ?>
        </div>

    </div>
</section>

<script>
function loadTestimonials(page) {
    fetch("fetch-testimonials.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "page=" + page
        })
        .then(res => res.text())
        .then(data => {
            document.getElementById("testimonialData").innerHTML = data;
        });
}

// First Load
loadTestimonials(1);

// Click Pagination
document.addEventListener("click", function(e) {
    if (e.target.classList.contains("test-btn")) {
        let page = e.target.getAttribute("data-page");

        loadTestimonials(page);

        document.querySelectorAll(".test-btn").forEach(btn => btn.classList.remove("btn-primary"));
        e.target.classList.add("btn-primary");
    }
});
</script>