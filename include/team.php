<?php
      $sql ="SELECT * FROM team";
      $result = $conn->query($sql);
?>


<nav id="main-nav">
  <?php
     if ($result->num_rows > 0) {
         // output data of each row
         while ($row = $result->fetch_assoc()) {
             ?>
   <ul>
     <li class="team">
       <a href="index.php?teamId=<?php echo $row['teamId']; ?>">
         <p class="t-title"><?php echo $row['teamName']; ?></p>
         <img class="t-img" src="<?php echo $row['teamImage']; ?>"/>
         <div>
           <p class="t-description"><?php echo $row['teamDescription']; ?></p>
         </div>
         <p class="t-button">More Info</p>
       </a>
     </li>
   </ul>
<?php
   }
   } else {
   echo "0 results";
   }
?>
</nav>
