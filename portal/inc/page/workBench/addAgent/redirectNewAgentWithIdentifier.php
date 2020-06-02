<?php

include_once 'inc/required/sessions.php';

$_SESSION['newAgentEntery'] = 1;

    header('Location: portal/workbench.php?id=1');

?>