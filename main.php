<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
  </head>
  <body>
    <div class="container">
      <div class="brand-logo"></div>
      <div class="brand-title">BITOID</div>
    <form class="inputs" action="fetch.php" method="POST">
      <label for="username">Username</label>
      <input type="text" name="username">
      <label for="data"> Choose: </label>
      <select name="data">
        <option value="follower">follower</option>
        <option value="repositories">repositories</option>
        <option value="both">followers & repositories</option>
      </select>
      <input type="submit" name="submit" class="button">
    </form>
    </div>
  </body>
</html>