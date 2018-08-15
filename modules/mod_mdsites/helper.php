<?php
/**
 * Helper class for Hello World! module
 * 
 * @package    Joomla.Tutorials
 * @subpackage Modules
 * @link http://docs.joomla.org/J3.x:Creating_a_simple_module/Developing_a_Basic_Module
 * @license        GNU/GPL, see LICENSE.php
 * mod_helloworld is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModMdSitesHelper
{
    /**
     * Retrieves the hello message
     *
     * @param   array  $params An object containing the module parameters
     *
     * @access public
     */    
    public static function getSites($params)
    {
		JFactory::getDocument()->addStyleSheet('https://cdnjs.cloudflare.com/ajax/libs/imagehover.css/1.0/css/imagehover.min.css');
        JFactory::getDocument()->addScript('my_script.js');
        return 'Hello, World!';
    }
}
