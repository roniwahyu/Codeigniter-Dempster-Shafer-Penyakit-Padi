<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Assets URL
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('assets_url'))
{
    function assets_url($uri = '')
    {
        $CI =& get_instance();

        $assets_url = $CI->config->item('assets_url');

        return $assets_url . trim($uri, '/');
    }
}
if ( ! function_exists('files_url'))
{
    function files_url($uri = '')
    {
        $CI =& get_instance();

        $files_url = $CI->config->item('files_url');

        return $files_url . trim($uri, '/');
    }
}
if ( ! function_exists('themes_url'))
{
    function themes_url($uri = '')
    {
        $CI =& get_instance();

        $themes_url = $CI->config->item('themes_url');

        return $themes_url . trim($uri, '/');
    }
}

if ( ! function_exists('redirect')){
    function redirect($uri = '', $method = 'location', $http_response_code = 302){
        if ( ! preg_match('#^https?://#i', $uri)){
            $uri = site_url($uri);
        }

        header( 'Expires: Sat, 26 Jul 1997 05:00:00 GMT' );
        header( 'Last-Modified: ' . gmdate( 'D, d M Y H:i:s' ) . ' GMT' );
        header( 'Cache-Control: no-store, no-cache, must-revalidate' );
        header( 'Cache-Control: post-check=0, pre-check=0', false );
        header( 'Pragma: no-cache' );   

        switch($method)
        {
            case 'refresh'  : header("Refresh:0;url=".$uri);
                break;
            default         : 
                header("Location: ".$uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }

}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */