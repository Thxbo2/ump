document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('search');
    const products = document.querySelectorAll('.product');
  
    searchInput.addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase();
      products.forEach((product) => {
        const productName = product.textContent.toLowerCase();
        product.style.display = productName.includes(query) ? 'block' : 'none';
      });
    });
  });