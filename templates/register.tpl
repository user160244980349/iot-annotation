<?php include 'header.tpl' ?>
<form action="register" method="post">
    <input type="text" name="username" placeholder="Enter your username" required><br>
    <input type="email" name="email" placeholder="Enter your email" required><br>
    <input type="password" name="password" placeholder="Enter your password" required><br>
    <input type="password" name="password_confirm" placeholder="Confirm password" required><br>
    <input type="submit" value="Submit">
</form>
<?php include 'footer.tpl' ?>