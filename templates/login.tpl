<?php include 'header.tpl' ?>
<a href="register">Sign Up</a>
<form action="login" method="post">
    <div><input type="text" name="username" placeholder="Enter your username" required></div>
    <div><input type="password" name="password" placeholder="Enter your password" required></div>
    <div><input type="submit" value="Submit"></div>
</form>
<?php include 'footer.tpl' ?>
