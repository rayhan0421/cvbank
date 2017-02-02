<?php
session_start();

session_destroy();

header("location: http://localhost/cvbank/views/login/");