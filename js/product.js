function changeImage(imageSrc) {
  // Lấy phần tử ảnh chính và thay đổi thuộc tính src
  document.getElementById("main-image").src = imageSrc;
}

// Thêm chức năng zoom ảnh
document.addEventListener("DOMContentLoaded", function () {
  var mainImage = document.getElementById("main-image");
  var zoomEffect = document.createElement("div");
  zoomEffect.className = "zoom-effect";
  mainImage.parentElement.appendChild(zoomEffect); // Thêm zoom effect vào phần tử chứa ảnh

  mainImage.addEventListener("mouseover", function () {
    zoomEffect.style.display = "block";
  });

  mainImage.addEventListener("mouseout", function () {
    zoomEffect.style.display = "none";
  });

  mainImage.addEventListener("mousemove", function (event) {
    var rect = mainImage.getBoundingClientRect();
    var x = event.clientX - rect.left; // X position of the mouse relative to the image
    var y = event.clientY - rect.top; // Y position of the mouse relative to the image

    // Calculate the position of the zoom effect overlay
    var zoomEffectX = (x / mainImage.offsetWidth) * 100;
    var zoomEffectY = (y / mainImage.offsetHeight) * 100;

    zoomEffect.style.backgroundImage = "url(" + mainImage.src + ")";
    zoomEffect.style.backgroundSize = "200% 200%"; // Zoom level
    zoomEffect.style.backgroundPosition = `${zoomEffectX}% ${zoomEffectY}%`;
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var decreaseBtn = document.getElementById("decrease-btn");
  var increaseBtn = document.getElementById("increase-btn");
  var quantityInput = document.getElementById("quantity-input");

  decreaseBtn.addEventListener("click", function () {
    var currentValue = parseInt(quantityInput.value, 10);
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  });

  increaseBtn.addEventListener("click", function () {
    var currentValue = parseInt(quantityInput.value, 10);
    quantityInput.value = currentValue + 1;
  });
});

document.addEventListener("DOMContentLoaded", function () {
  function updateDateTime() {
    const now = new Date();
    const optionsTime = { hour: "2-digit", minute: "2-digit" };
    const optionsDate = { day: "2-digit", month: "short", year: "numeric" };

    // Format the time and date
    const timeString = now.toLocaleTimeString("en-US", optionsTime);
    const dateString = now.toLocaleDateString("en-US", optionsDate);

    // Update the elements with the current time and date
    document.getElementById("current-time").textContent = ` ${timeString}`;
    document.getElementById("current-date").textContent = ` ${dateString}`;
  }

  // Run the function on page load
  updateDateTime();
});
