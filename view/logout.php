<?php
// unsets all the sessions upon logging out.
unset( $_SESSION['userName'] );
unset( $_SESSION['phone'] );
unset( $_SESSION['numberToVerify'] );
unset( $_SESSION['loggedIn'] );
unset( $_SESSION['userType'] );

// Takes user back to home page after logout.
header( 'Location: ./home' );

die;

// After logout and sessions are unset, navigation pane will go back to only showing selected buttons.
