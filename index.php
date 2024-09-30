<?php
// Initialize settings and environment
require_once("modules/initialize.php");

// Retrieve portal information and populate variables
require_once("modules/portal.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
	// Identify form, populate session and call page
	require_once("modules/post.php");
} else {	
	// Identify page and populate page variables
	require_once("modules/page.php");
}

// Include HTML head
require_once("head.php");

// Start body
echo '<body class="header-fixed"><div class="wrapper">';

// Include header
require_once("header.php");

// Load page-specific program
require_once($pag_programa);

// Include footer
include("footer.php");

echo '</div><!--/wrapper-->';

// Include analytics script
include("analytics.php");
?>

</body>
</html>
