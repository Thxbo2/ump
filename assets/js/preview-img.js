function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image_preview');
    const originalSrc = 'assets/images/sale-bg.jpg'; // Original image source

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result; // Set the image source to the file's data URL
        preview.style.display = 'block'; // Make the image visible
      };

    reader.onerror = function() {
        // Handle errors during file reading
        console.error("Error reading the file.");
        preview.src = originalSrc; // Reset to the original image
        preview.style.display = 'block'; // Ensure the image is visible
    };

      reader.readAsDataURL(input.files[0]); // Read the file as a data URL
    }
    else {
      // Reset to the original image if no file is selected
      preview.src = originalSrc;
      preview.style.display = 'block'; // Ensure the image is visible
    }
  }

  // Reset the image to the original source when the page reloads
window.onload = function() {
    const preview = document.getElementById('image_preview');
    const originalSrc = 'assets/images/sale-bg.jpg'; // Original image source
    preview.src = originalSrc; // Reset to the original image
    preview.style.display = 'block'; // Ensure the image is visible
};