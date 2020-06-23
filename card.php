<div class="w3 container border-top" style="padding-bottom: 10px">
          <div class="w3-row-padding">
            <div class="w3-col m2">
              <br>
              <div> <?php echo $row['QVotes']; ?> <i>votes</i></div>
              <br>
              <div><?php echo $row['QAnswers']; ?> <i>answers</i></div>
              <br>
            </div>

            <div class="w3-col m9">
              <div>
                <h4> <strong><?php echo $row['QTitle']; ?></strong></h4>
              </div>
              <br>
              <div>
                <strong>Tags: </strong> <?php echo $row['QTags']; ?>
                <a href="qdetailsn.php?details=<?php echo $row['QID']; ?>" class="btn btn-primary w3-margin-left">View Details</a>
              </div>
            </div>

          </div>
        </div>
