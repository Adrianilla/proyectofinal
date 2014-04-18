<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
          if ( ! function_exists('permalink'))
{
        function permalink($title){    
                return str_replace(" ", "-", strtolower($title));
        }
        if ( ! function_exists('login_site')){
        function login_site(){ 
                $CI =& get_instance();         
                if(!$CI->session->userdata('is_logged_in'))
                        redirect(base_url().'users/signin');
        }
     }
}
if ( ! function_exists('tags')){
        function tags($tags){          
                $tags = explode(',', $tags);
                foreach ($tags as $t)
                        echo '<u>'.$t.'</u> ';                 
        }
}
if ( ! function_exists('convertDateTimetoTimeAgo')){
        function convertDateTimetoTimeAgo($datetime){          
                $date = str_replace("-", "", substr($datetime, 0, 10));
                $time = str_replace(":", "", substr($datetime, 11, 5));
                //Fecha estilo TimeAgo
                return "<script>document.write(moment('$date$time', 'YYYYMMDDHHmm').fromNow());</script>";             
        }
}

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Array Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/helpers/array_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Element
 *
 * Lets you determine whether an array index is set and whether it has a value.
 * If the element is empty it returns FALSE (or whatever you specify as the default value.)
 *
 * @access	public
 * @param	string
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('element'))
{
	function element($item, $array, $default = FALSE)
	{
		if ( ! isset($array[$item]) OR $array[$item] == "")
		{
			return $default;
		}

		return $array[$item];
	}
}

// ------------------------------------------------------------------------

/**
 * Random Element - Takes an array as input and returns a random element
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('random_element'))
{
	function random_element($array)
	{
		if ( ! is_array($array))
		{
			return $array;
		}

		return $array[array_rand($array)];
	}
}

// --------------------------------------------------------------------

/**
 * Elements
 *
 * Returns only the array items specified.  Will return a default value if
 * it is not set.
 *
 * @access	public
 * @param	array
 * @param	array
 * @param	mixed
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('elements'))
{
	function elements($items, $array, $default = FALSE)
	{
		$return = array();
		
		if ( ! is_array($items))
		{
			$items = array($items);
		}
		
		foreach ($items as $item)
		{
			if (isset($array[$item]))
			{
				$return[$item] = $array[$item];
			}
			else
			{
				$return[$item] = $default;
			}
		}

		return $return;
	}
}

/* End of file array_helper.php */
/* Location: ./system/helpers/array_helper.php */