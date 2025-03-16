<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
  define('ROOT', 'http://localhost/event-management/public');
} else {
  define('ROOT', 'https://www.yourwebsite.com/event-management/public');
}
