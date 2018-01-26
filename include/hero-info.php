<?php
$heroId = 0;

   if (isset($_GET['heroId'])) {
       $heroId = $_GET['heroId'];
       $sql ="SELECT * FROM hero WHERE heroId='".$heroId."'";
   } else {
       $sql ="SELECT * FROM hero WHERE heroId='".$heroId."'";
   }

   if (isset($_GET['heroId'])) {
       $heroId = $_GET['heroId'];
       $sql2 ="SELECT ROUND(AVG(rating), 1) AS rating_avg FROM rating WHERE heroId='".$heroId."'";
   } else {
       $sql2 ="SELECT * FROM rating WHERE heroId='".$heroId."'";
   }

          if ($_SERVER['REQUEST_METHOD'] == "POST") { // runs when something is posted to this script..
                 $Id = $_POST['heroId'];
                 $rating  = $_POST['rating'];
                 $Datum  = $_POST['ratingDate'];
                 $Review  = $_POST['ratingReview'];
                 $query   = "INSERT into rating (heroId,rating,ratingDate,ratingReview)
              VALUES('" . $Id . "','" . $rating . "','" . $Datum . "','" . $Review . "')";
                 $success = $conn->query($query);
                 if ($success) {
                  echo '<script language="javascript">';
                  echo 'alert("Thank you for your review")';
                  echo '</script>';
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Somthing went wrong please try again later")';
                    echo '</script>';
                }
}

  $result = $conn->query($sql);
  $result2 = $conn->query($sql2);

  $result = $conn->query($sql);
    if($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          $average = $result2->fetch_assoc();
           print_r($result2->fetch_assoc()); ?>
 <div class="info">
   <div class="info-title"><?php echo "The average rating of the hero is: " . $average['rating_avg'] . "/5.0 "; ?><i class="fa fa-star" style="color:gold;" aria-hidden="true"></i></div>
     <h1 class="info-title">
       <?php echo $row['heroName']; ?>
     </h1>
     <img class="info-img" src="<?php echo $row['heroImage']; ?>"/>
     <div class="info-title">Description:</br></div>
     <div class="info-description">
       <?php echo $row['heroDescription']; ?>
     </div>
     <div class="hero-powers">
         <div class="info-title">SuperPowers:</br></div>
         <p class="info-description"><?php echo $row['heroPower']; ?></p>
      </div>
      <div class="info-title">Review:</br></div>
        <form method="POST" class="form-rate">
          <fieldset>
           <div class="rate">
            <input type="radio" id="rating10" name="rating" value="5" /><label class="lblRating" for="rating10" title="5 stars"></label>
            <input type="radio" id="rating9" name="rating" value="4.5" /><label class="lblRating half" for="rating9" title="4 1/2 stars"></label>
            <input type="radio" id="rating8" name="rating" value="4" /><label class="lblRating" for="rating8" title="4 stars"></label>
            <input type="radio" id="rating7" name="rating" value="3.5" /><label class="lblRating half" for="rating7" title="3 1/2 stars"></label>
            <input type="radio" id="rating6" name="rating" value="3" /><label class="lblRating" for="rating6" title="3 stars"></label>
            <input type="radio" id="rating5" name="rating" value="2.5" /><label class="lblRating half" for="rating5" title="2 1/2 stars"></label>
            <input type="radio" id="rating4" name="rating" value="2" /><label class="lblRating" for="rating4" title="2 stars"></label>
            <input type="radio" id="rating3" name="rating" value="1.5" /><label class="lblRating half" for="rating3" title="1 1/2 stars"></label>
            <input type="radio" id="rating2" name="rating" value="1" /><label class="lblRating" for="rating2" title="1 star"></label>
            <input type="radio" id="rating1" name="rating" value="0.5" /><label class="lblRating half" for="rating1" title="1/2 star"></label>
            <input required type="radio" id="rating0" name="rating" value="0" /><label class="lblRating" for="rating0" title="No star"></label>
          </div>
         <div class="review">
            <textarea class="text-review" id="ratingReview" name="ratingReview" value="" placeholder="Write a review please..." required></textarea>
         </div>
         <div class="rate-submit">
            <input class="review-btn" type="submit" name="submitRating" value="Rate Hero" />
            <input type="hidden" name="ratingDate" value="<?php
               date_default_timezone_set("Europe/Amsterdam");
           $date = date_create();
           echo date_timestamp_get($date); ?>"/>
            <input type="hidden" name="heroId" value="<?php echo $row['heroId']; ?>"/>
         </div>
      </fieldset>
   </form>
   <?php include 'js/review.js'; ?>
   <button id="showReviews" = onclick="review()">Show the reviews</button>
   <div id="review-text">
     <?php
   $sql ="SELECT * FROM rating Where heroid='".$heroId."'";
   $result = $conn->query($sql);

if ($result->num_rows > 0) {
   echo "<table><tr><th>RatingDate</th><th>Rating:</th><th>Review's:</th></tr>";
   // output data of each row
   while ($row = $result->fetch_assoc()) {
       echo "<tr><td>" . strftime("%d-%I-%Y \n %X", $row["ratingDate"]). "</td><td>" . $row["rating"]. "</td><td>" . $row["ratingReview"]. "</td></tr>";
   }
   echo "</table>";
} else {
   echo "0 results";
} ?>
   </div>
 </div>
 <?php
    }
    } else {
        echo"<h1 class='info-description'>Select a Hero</h1>";
    }
 ?>
