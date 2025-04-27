<!DOCTYPE html>
<html>
<head>
    <title>Products List</title>
    <style>
        :root {
            --bg-color: #121212;
            --text-color: #e0e0e0;
            --link-color: #bb86fc;
            --link-hover-color: #9a67ea;
            --table-bg: #1e1e1e;
            --table-border: #333;
            --button-bg: #bb86fc;
            --button-text: #121212;
            --input-bg: #2c2c2c;
            --input-text: #e0e0e0;
            --input-border: #444;
        }
        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        a {
            color: var(--link-color);
            text-decoration: none;
        }
        a:hover {
            color: var(--link-hover-color);
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: var(--table-bg);
            margin-top: 10px;
        }
        th, td {
            border: 1px solid var(--table-border);
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #2c2c2c;
        }
        tr:nth-child(even) {
            background-color: #222;
        }
        tr:hover {
            background-color: #333;
        }
        button, a.button-link {
            background-color: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }
        button:hover, a.button-link:hover {
            background-color: #9a67ea;
        }
    </style>
</head>
<body>
    <h1>Products</h1>
    <a href="/products/create" class="button-link">Add New Product</a> |
    <a href="/products/exportPdf" class="button-link">Export PDF</a> |
    <a href="/products/exportExcel" class="button-link">Export Excel</a>
    <table>
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
                            <a href="/products/edit/<?= esc($product['id']) ?>" class="button-link">Edit</a> |
                            <a href="/products/delete/<?= esc($product['id']) ?>" class="button-link" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No products found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
