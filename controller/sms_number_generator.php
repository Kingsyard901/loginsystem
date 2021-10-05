<?php

// Generate a random number with 6 digits using cryptographically secure pseudo-random integers
// https://www.php.net/manual/en/function.random-int.php
// I wanted the classical 6-digit type. therefore 100000 - 999999
$numberVerification = random_int(100000, 999999);
