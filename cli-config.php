<?php

require_once "config/bootstrap.php";  // Asegúrate de que la ruta sea correcta

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
