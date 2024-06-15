
<html>
   <head>
    <title>Admin Login</title>

    <?php
    include'header_link.php';
    ?>

   </head>
   <body style="position:fixed; width:100%;">
   <?php
    include'header.php';
    ?>
        <br><hr>
        <!--<h4>Admin Login</h4>-->
         <h3 style=' border-radius: 25px;
          border: 2px solid #73AD21;
          padding: 12px;
          width: 300px;
          height: 60px;
          align:center;
          background-color:orange;
          text-align: center;
          margin-left: 520px;'>Add Security</h3><br><br><br><hr>
     <form method="POST" action="addsecurity.php" id="contact" style=" margin-left: 500px;">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="address" id="address" style="width:208px;"></textarea></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td>Phoneno</td>
                <td><input type="phone" name="phone" id="phone"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" id="password"></td>
            </tr>
             <tr>
                <td colspan="2"><input type="submit" value="login" name="btn" id="btn" style=" margin-left: 150px;"></td>
             </tr>
        </table>
    </form>
    <!-- ///////////////////////////////////////////////////////// -->
    <!--<form  method="POST" action="addsecurity.php" id="#contact" style=" margin-left: 400px;">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" Style="width:400px;" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <input type="text" class="form-control" id="Address" Style="width:400px;" required >
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" Style="width:400px;" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="phone" class="form-control" id="phone" Style="width:400px;" required>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" Style="width:400px;" required>
  </div><br><br>
    <button type="submit" class="btn btn-primary" style= "margin-left: 150px;">Login</button>
</form>-->
<?php
    include'footer.php';
    ?>
    </body>
</html>