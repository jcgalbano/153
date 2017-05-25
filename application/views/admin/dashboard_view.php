<div class="container">
  <h1>Welcome to the Dashboard!</h1>
<?php
    echo "Username: ";
    echo $user->username."<br>";
    echo "Name: ";
    echo $user->first_name." "; 
    echo $user->last_name."<br>";
    echo "Address: ";
    echo $user->address."<br>";
    echo "Birthday: ";
    echo $user->birthday."<br><br>";

    echo "Logged-In Users:<br>";
    foreach($objects as $object) {
          echo $object->username."<br>";
    }




?>
</div>
