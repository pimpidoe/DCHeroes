<?php
   $idteam = 0;

   if (isset($_GET['teamId'])) {
      $idteam = $_GET['teamId'];
      $sql ="SELECT heroId, heroName, heroDescription, heroImage, teamId FROM hero WHERE teamId='".$idteam."'";
      } else {
          $sql ="SELECT heroId, heroName, heroDescription, heroImage, teamId FROM hero";
      }

 $result = $conn->query($sql);
   if ($result->num_rows > 0) {
       // output data of each row
       while ($row = $result->fetch_assoc()) {
      ?>

     <li class="hero">
       <a href="index.php?teamId=<?php echo $row['teamId']; ?>&heroId=<?php echo $row['heroId']; ?>">
         <p class="h-title"><?php echo $row['heroName']; ?></p>
         <img class="h-img" src="<?php echo $row['heroImage']; ?>"/>
         <div>
           <p class="h-description"><?php echo $row['heroDescription']; ?></p>
         </div>
         <p class="h-button">More Info</p>
       </a>
     </li>

<?php
   }
   } else {
   }
?>
