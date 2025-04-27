<!DOCTYPE html>
<html>
<head>
  <title>Add New Product</title>
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
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    a {
      color: var(--link-color);
      text-decoration: none;
    }
    a:hover {
      color: var(--link-hover-color);
      text-decoration: underline;
    }
    input[type="text"], input[type="number"], textarea {
      background-color: var(--input-bg);
      color: var(--input-text);
      border: 1px solid var(--input-border);
      padding: 6px;
      border-radius: 4px;
      width: 300px;
      font-size: 14px;
      margin-bottom: 10px;
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
  <h1>Add New Product</h1>
  <form action="/products/create" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>
    <label for="price">Price:</label>
    <input type="number" step="0.01" id="price" name="price" required>
    <button type="submit">Save</button>
  </form>
  <a href="/products" class="button-link">Back to Products List</a>
</body>
</html>
