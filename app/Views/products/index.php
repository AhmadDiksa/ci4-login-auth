<!DOCTYPE html>
<html>
<head>
  <title>Products List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
  <nav style="background-color: #120025; padding: 10px 20px;">
    <a href="/dashboard" style="color: #ffffff; text-decoration: none; font-weight: bold; font-size: 1.2rem;">Dashboard</a>
  </nav>
  <div class="container py-5">
    <h1 class="mb-4">Products</h1>
    <div class="mb-3">
      <a href="/products/create" class="btn btn-primary me-2">Add New Product</a>
      <a href="/products/exportPdf" class="btn btn-secondary me-2">Export PDF</a>
      <a href="/products/exportExcel" class="btn btn-secondary">Export Excel</a>
    </div>
    <table class="table table-dark table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($products) && is_array($products)): ?>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><?= esc($product['id']) ?></td>
              <td><?= esc($product['name']) ?></td>
              <td><?= esc($product['description']) ?></td>
              <td><?= esc($product['price']) ?></td>
              <td>
                <a href="/products/edit/<?= esc($product['id']) ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                <form action="/products/delete/<?= esc($product['id']) ?>" method="post" style="display:inline;">
                  <?= csrf_field() ?>
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="5" class="text-center">No products found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
