<?php

$mysql = new mysqli('localhost', 'root', '', 'cms');

if (!$mysql->connect_error) {
	echo 'We are connected';
}
