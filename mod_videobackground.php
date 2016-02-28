
<?php defined('_JEXEC') or die;
 
$moduleclass_sfx = htmlspecialchars($params->get("moduleclass_sfx"));
$sourcevideo = htmlspecialchars($params->get("sourcevideo"));
$autoplay = htmlspecialchars($params->get("autoplay"));
$image = htmlspecialchars($params->get("image"));
// Interroga G+ e valorizza la variabile $posts per una successiva visualizzazione
 
// Richiama il layout selezionato per questo modulo
require JModuleHelper::getLayoutPath("mod_videobackground", $params->get('layout', 'default'));
 