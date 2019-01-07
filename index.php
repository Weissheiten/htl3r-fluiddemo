<?php

require_once __DIR__ . '/vendor/autoload.php';


class Waschbecken
{
    protected $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Waschbecken constructor.
     * @param $name Name of the sink
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return "Hello Waschbecken!";
    }
}

// Waschbecken aus der Datenbank abfragen
$waschbecken[] = new Waschbecken("Der goldene Hans");
$waschbecken[] = new Waschbecken("Der silberne Erich");
$waschbecken[] = new Waschbecken("Der bronzene Kurt");
$waschbecken[] = new Waschbecken("Der stählerne Ernst");


// Initializing the View: rendering in Fluid takes place through a View instance
// which contains a RenderingContext that in turn contains things like definitions
// of template paths, instances of variable containers and similar.
$view = new \TYPO3Fluid\Fluid\View\TemplateView();

// TemplatePaths object: a subclass can be used if custom resolving is wanted.
$paths = $view->getTemplatePaths();

// Assigning the template path and filename to be rendered. Doing this overrides
// resolving normally done by the TemplatePaths and directly renders this file.
$paths->setTemplatePathAndFilename(__DIR__ . '/Templates/Waschbecken.html');

$view->assignMultiple(
    array(
        "Waschbecken" => $waschbecken
    )
);

// Rendering the View: plain old rendering of single file, no bells and whistles.
$output = $view->render();

echo $output;


