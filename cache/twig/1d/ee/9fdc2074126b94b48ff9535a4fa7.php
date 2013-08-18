<?php

/* index.html.twig */
class __TwigTemplate_1dee9fdc2074126b94b48ff9535a4fa7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
	parent::__construct($env);

	$this->parent = false;

	$this->blocks = array(
	);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
	// line 1
	echo "<!DOCTYPE HTML>
<head>
    <script type=\"text/javascript\" src=\"/js/angular.min.js\"></script>
    <script type=\"text/javascript\" src=\"/js/angular-resource.min.js\"></script>
    <script type=\"text/javascript\" src=\"/js/search-app/app.js\"></script>
    <script type=\"text/javascript\" src=\"/js/search-app/controllers/mainController.js\"></script>
</head>
<body>
    <div ng-app='SearchApp' ng-controller='mainController' ng-init='init()'>
	hello
    </div>
</body>
</html>
";
    }

    public function getTemplateName()
    {
	return "index.html.twig";
    }

    public function getDebugInfo()
    {
	return array (  19 => 1,);
    }
}
