let groupImages = [];
let currentIndex = 0;

function openGroup(images) {
    groupImages = images;
    currentIndex = 0;
    document.getElementById("lightbox").classList.add("show");
    document.getElementById("lightboxImg").src = groupImages[currentIndex];
}

function changeSlide(step) {
    currentIndex = (currentIndex + step + groupImages.length) % groupImages.length;
    document.getElementById("lightboxImg").src = groupImages[currentIndex];
}

function closeLightbox() {
    document.getElementById("lightbox").classList.remove("show");
}


// Principle page timeline

document.addEventListener("DOMContentLoaded", function () {
    const items = document.querySelectorAll(".animate-item");

    function reveal() {
        items.forEach(item => {
            const top = item.getBoundingClientRect().top;
            if (top < window.innerHeight - 100) {
                item.classList.add("show");
            }
        });
    }

    window.addEventListener("scroll", reveal);
    reveal();
});


// sidebar
// Sidebar Dynamic Switching
document.querySelectorAll('.sidebar-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();

        // Remove active from all
        document.querySelectorAll('.sidebar-link').forEach(l => l.classList.remove('active'));

        // Add active to clicked
        this.classList.add('active');

        // Hide all sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.add('d-none');
        });

        // Show selected section
        const target = this.getAttribute('data-target');
        document.getElementById(target).classList.remove('d-none');

        // Close mobile menu if open
        const offcanvas = bootstrap.Offcanvas.getInstance(document.getElementById('mobileSidebar'));
        if (offcanvas) { offcanvas.hide(); }
    });
});


