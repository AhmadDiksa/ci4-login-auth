<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <style>
        :root {
            --bg-color: #121212;
            --text-color: #e0e0e0;
            --link-color: #bb86fc;
            --link-hover-color: #9a67ea;
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

        input[type="text"],
        input[type="number"],
        textarea {
            background-color: var(--input-bg);
            color: var(--input-text);
            border: 1px solid var(--input-border);
            padding: 6px;
            border-radius: 4px;
            width: 300px;
            font-size: 14px;
        }

        button,
        a.button-link {
            background-color: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
        }

        button:hover,
        a.button-link:hover {
            background-color: #9a67ea;
        }
    </style>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="/products/edit/<?= esc($product['id']) ?>" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?= esc($product['name']) ?>" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description"><?= esc($product['description']) ?></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" step="0.01" id="price" name="price" value="<?= esc($product['price']) ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="/products" class="button-link">Back to Products List</a>
</body>
</html>
