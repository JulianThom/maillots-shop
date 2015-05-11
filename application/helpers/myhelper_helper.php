<?php 
function formatPrix($chiffre)
{
	if (is_float($chiffre)) {
		return number_format($chiffre, 2, ",", " ");
	} else {
		return number_format($chiffre, 0);
	}
	
}