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


