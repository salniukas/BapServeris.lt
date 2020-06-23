<?php
	$con = mysqli_connect(
		"localhost", /// LocalHost
		"u166743112_test", /// Duomen� baz�s slapyvardis
		"Salniukas321", /// Duomen� baz�s slapta�odis
		"u166743112_test" /// duomen� baz�s lentel�s pavadinimas
	);
	if (mysqli_connect_errno()) {
	echo "[MySQL] Klaida: " . mysqli_connect_error();
	}
?>