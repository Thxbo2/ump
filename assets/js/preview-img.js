function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('image_preview');

    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = function(e) {
        preview.src = e.target.result; // Set the image source to the file's data URL
        preview.style.display = 'block'; // Make the image visible
      };

      reader.readAsDataURL(input.files[0]); // Read the file as a data URL
    }
    else {
      preview.src = ''; // Clear the image source if no file is selected
      preview.style.display = 'none'; // Hide the image
    }
  }