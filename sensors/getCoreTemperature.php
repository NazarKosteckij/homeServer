<?php
			$data = file_get_contents("/home/server/scripts/number");
			$data = $data - 0;
			$name = "temperature";
			print("{\"$name\":\"$data\"}");
		?>
