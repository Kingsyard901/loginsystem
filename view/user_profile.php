<?php

// Verify that session and user is valid before showing ldap_control_paged_result

if (!$_SESSION) {
  echo 'You are not logged in.';
} else {
  echo 'You are now logged in as: ' . $_SESSION['username'];
}
