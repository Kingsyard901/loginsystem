<?php
// Need to find a way to kill all sessionparts and not just userName.
  unset( $_SESSION['userName'] );

  header( 'Location: ./home' );

  die;
