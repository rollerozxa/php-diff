<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<title>PHP LibDiff - Examples</title>
		<link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8"/>
	</head>
	<body>
		<h1>PHP LibDiff - Examples</h1>
		<hr />
		<?php

		// Include the diff class
		require_once dirname(__FILE__).'/../lib/Diff.php';

		// Include two sample files for comparison
		$a = explode("\n", file_get_contents(dirname(__FILE__).'/a.txt'));
		$b = explode("\n", file_get_contents(dirname(__FILE__).'/b.txt'));

		// Options for generating the diff
		$options = array(
			//'ignoreWhitespace' => true,
			//'ignoreCase' => true,
		);

		// Initialize the diff class
		$diff = new Diff($a, $b, $options);

		?>
		<h2>Inline Diff</h2>
		<?php

		// Generate an inline diff
		require_once dirname(__FILE__).'/../lib/Diff/Renderer/Inline.php';
		$renderer = new Diff_Renderer_Html_Inline;
		echo $diff->render($renderer);

		?>
		<h2>Unified Diff</h2>
		<pre><?php

		// Generate a unified diff
		require_once dirname(__FILE__).'/../lib/Diff/Renderer/Unified.php';
		$renderer = new Diff_Renderer_Text_Unified;
		echo htmlspecialchars($diff->render($renderer));

		?>
		</pre>
	</body>
</html>