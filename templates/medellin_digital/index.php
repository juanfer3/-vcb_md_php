<?php
/**
* @package     Joomla.Site
* @subpackage  Templates.protostar
*
* @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
* @license     GNU General Public License version 2 or later; see LICENSE.txt
*/
defined('_JEXEC') or die;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

// Add Stylesheets
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/bootstrap.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/template.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/overrides.css');

// Add scripts
JHtml::_('jquery.framework');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/popper.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js');

// Adjusting content width
if ($this->countModules('sidebar-left') && $this->countModules('sidebar-right')) {
  $span = "col-md-6";
} elseif ($this->countModules('sidebar-left') && !$this->countModules('sidebar-right')) {
  $span = "col-md-9";
} elseif (!$this->countModules('sidebar-left') && $this->countModules('sidebar-right')) {
  $span = "col-md-9";
} else {
  $span = "col-md-12";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <jdoc:include type="head" />
  <?php if($this->params->get('favicon')) { ?>
    <link rel="shortcut icon" href="<?php echo JUri::root(true) . htmlspecialchars($this->params->get('favicon'), ENT_COMPAT, 'UTF-8'); ?>" />
  <?php } ?>
  <!--[if lt IE 9]>
  <script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script>
  <![endif]-->
</head>
<body>
  <?php if ($this->countModules('navbar-top')) : ?>
    <jdoc:include type="modules" name="navbar-top" style="none" />
  <?php endif; ?>
  <div class="container bg-white d-none d-sm-block">
    <div class="d-flex justify-content-between">
      <div class="ml-3 align-self-end p-1">
        <div class="d-flex flex-column">
          <div class="p-2">
            <?php echo strftime('%d de %B de %Y'); ?>
          </div>
          <div class="p-2">
            <span>
              <a href="https://www.facebook.com/AlcaldiadeMed" target="_blank">
                <img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/facebook.png' ?>">
              </a>
            </span>
            <span>
              <a href="https://twitter.com/AlcaldiadeMed" target="_blank">
                <img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/twitter.png' ?>">
              </a>
            </span>
            <span>
              <a href="https://instagram.com/alcaldiademed/" target="_blank">
                <img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/instagram.png' ?>">
              </a>
            </span>
            <span>
              <a href="https://www.youtube.com/channel/UCAFLU70jPz4bODq_5BSWPIg" target="_blank">
                <img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/youtube.png' ?>">
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="p-1 mr-3 align-self-center">
        <span>
          <a href="http://es.presidencia.gov.co/" target="_blank">
            <img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/escudo-de-colombia.jpg' ?>" style="height: 75px;">
          </a>
        </span>
        <span>
          <a href="https://www.medellin.gov.co/" target="_blank">
            <img class="img-fluid" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/medellin.png' ?>" style="height: 75px;">
          </a>
        </span>
      </div>
    </div>
  </div>
  <?php if ($this->countModules('navbar-main')) : ?>
    <nav class="navbar navbar-expand-md navbar-light bg-mdigital nav-mdigital">
      <div class="container">
        <a class="navbar-brand p-0 d-block d-sm-none" href="https://www.medellin.gov.co/" target="_blank">
          <img class="img-fluid" style="max-height: 80px;" src="<?php echo $this->baseurl . '/templates/' . $this->template . '/images/logos/site.png' ?>" alt="<? php echo $sitename ?>">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_navbar">
          <jdoc:include type="modules" name="navbar-main" style="none" />
        </div>
      </div>
    </nav>
  <?php endif; ?>
  <?php if ($this->countModules('breadcrumbs')) : ?>
    <jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
  <?php endif; ?>
  <div class="body">
    <div class="content">
      <div class="container">
        <jdoc:include type="modules" name="banner" style="xhtml" />
        <div class="row">
          <?php if ($this->countModules('sidebar-left')) : ?>
            <div id="sidebar" class="col-md-3">
              <div class="sidebar-nav">
                <jdoc:include type="modules" name="sidebar-left" style="xhtml" />
              </div>
            </div>
          <?php endif; ?>
          <main id="content" role="main" class="<?php echo $span; ?>">
            <jdoc:include type="modules" name="position-3" style="xhtml" />
            <jdoc:include type="message" />
            <jdoc:include type="component" />
            <jdoc:include type="modules" name="position-2" style="none" />
          </main>
          <?php if ($this->countModules('sidebar-right')) : ?>
            <div id="aside" class="col-md-3">
              <jdoc:include type="modules" name="sidebar-right" style="xhtml" />
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <jdoc:include type="modules" name="sites" style="none" />
  <jdoc:include type="modules" name="footer" style="none" />
  <jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
