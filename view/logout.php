<?php
// Need to find a way to kill all sessionparts and not just userName.
unset( $_SESSION['userName'] );
unset( $_SESSION['phone'] );
unset( $_SESSION['numberToVerify'] );
unset( $_SESSION['loggedIn'] );

header( 'Location: ./home' );

die;
