<?php

function List_Files($Files, $Recursive = true, $Sub = false) {

	global $MDR;

	$Return = '<div class="grid">';

	foreach ( $Files as $File => $Title ) {

		if ( is_array($Title) ) {

			require_once $MDR['Core'].'/function.url_to_title.php';
			$Return .= '<div class="grid"><h2><a class="heading-link" href="'.$File.'"><em>'.url_to_title($File).'</em></a></h2></div>';

			if ( $Recursive ) {
				$Return .= '<div class="grid">';
				$Return .= List_Files($Title, $Recursive, $File);
				$Return .= '</div>';
		}

		} else {
			$Return .= '<div class="column half">';
			if ( $Recursive ) {
				$Return .= '<h4>';
			} else {
				$Return .= '<h2>';
			}

			if ( $File != '__NON_RECURSIVE__' ) {
				$Return .= '<a class="heading-link" href="';

				if ( $Sub ) {
					$Return .= $Sub;
				}
				$Return .= $File.'">'.$Title.'</a>';

			require_once $MDR['Core'].'/function.excerpt.php';
			$Return .= json_encode($Files);
			// $Return .= Excerpt($File);

			} else {
				$Return .= $Title;
			}


			if ( $Recursive ) {
				$Return .= '</h4>';
			} else {
				$Return .= '</h2>';
			}
			$Return .= '</div>';
		}
	}

	$Return .= '</div>';

	return $Return;

}