const track = document.querySelector(".ekskul-track");
const wrapper = document.querySelector(".ekskul-track-wrapper");
const btnLeft = document.querySelector(".slider-btn.left");
const btnRight = document.querySelector(".slider-btn.right");
const dots = document.querySelectorAll(".slider-dots .dot");

let currentIndex = 0;
const cardsPerSlide = 4; // tampil 4 sekaligus
const cardWidth = 270; // lebar card + gap
const totalSlides = Math.ceil(track.children.length / cardsPerSlide);

function stopAutoSlide() {
  track.style.animation = "none";
}

function updateDots(index) {
  dots.forEach((dot, i) => {
    dot.classList.toggle("active", i === index);
  });
}

btnRight.addEventListener("click", () => {
  stopAutoSlide();
  if (currentIndex < totalSlides - 1) {
    currentIndex++;
  }
  wrapper.scrollTo({
    left: currentIndex * (cardWidth * cardsPerSlide),
    behavior: "smooth",
  });
  updateDots(currentIndex);
});

btnLeft.addEventListener("click", () => {
  stopAutoSlide();
  if (currentIndex > 0) {
    currentIndex--;
  }
  wrapper.scrollTo({
    left: currentIndex * (cardWidth * cardsPerSlide),
    behavior: "smooth",
  });
  updateDots(currentIndex);
});

dots.forEach((dot, i) => {
  dot.addEventListener("click", () => {
    stopAutoSlide();
    currentIndex = i;
    wrapper.scrollTo({
      left: currentIndex * (cardWidth * cardsPerSlide),
      behavior: "smooth",
    });
    updateDots(currentIndex);
  });
});
