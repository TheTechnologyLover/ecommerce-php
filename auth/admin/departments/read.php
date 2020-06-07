<?php

    $results = addSrNo(Crud::read("SELECT * FROM departments"), true);

    $output = "";

    $output = displayRedirectMessage($_GET, "edit", "Record edited successfully!", "Record not edited!");