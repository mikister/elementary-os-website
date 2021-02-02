<?php

function Excerpt($File) {

    global $MDR;

	$Return = file_get_contents($File, FALSE, NULL, 0, 100);

	return $Return;

}
