<html>
    <head>
        <title>Edit Profile</title>
        <?php
            include'header_link.php';
        ?>
    </head>
    <body>
    <?php
             include'header.php';
        ?>
        <h3>Edit Profile</h3>
        <form method="POST" action="editprofile.php">
            <table border="1">
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="submit"></td>
                </tr>
            </table>
        </form>
        <?php
            include'footer.php'; 
        ?>
    </body>
</html>