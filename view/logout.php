<?php
  unset( $_SESSION['username'] );

  header( 'Location: ./home' );

  die;
