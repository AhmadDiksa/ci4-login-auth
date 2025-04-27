<!DOCTYPE html>
<html>
<head>
  <title>Add New Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
  <div class="container py-5">
    <h1 class="mb-4">Add New Product</h1>
  <form action="/products/create" method="post" class="needs-validation" novalidate>
      <?= csrf_field() ?>
      <?php if (isset($validation)): ?>
        <div class="alert alert-danger">
          <?= $validation->listErrors() ?>
        </div>
      <?php endif; ?>
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control bg-secondary text-light border-0" id="name" name="name" required>
        <div class="invalid-feedback">
          Please enter the product name.
        </div>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea class="form-control bg-secondary text-light border-0" id="description" name="description" rows="3"></textarea>
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <input type="number" step="0.01" class="form-control bg-secondary text-light border-0" id="price" name="price" required>
        <div class="invalid-feedback">
          Please enter the product price.
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <a href="/products" class="btn btn-secondary ms-2">Back to Products List</a>
    </form>
  </div>
  <script>
    (() => {
      'use strict'
      const forms = document.querySelectorAll('.needs-validation')
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>
</html>
