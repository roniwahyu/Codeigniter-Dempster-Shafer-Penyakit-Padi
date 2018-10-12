<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('set_permalink'))
{
	function set_permalink($id,$content,$years = null,$months = null,$categories = null,$slugs = null)
	{
		$karakter = array ('{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
		$link_akhir ="";
		if(!(is_null($years)) && !(is_null($months))){
			$tahun= strtolower(str_replace($karakter,"",$years));
			$tahun_strip = strtolower(str_replace(' ', '/', $tahun));
			$bulan= strtolower(str_replace($karakter,"",$months));
			$bulan_strip = strtolower(str_replace(' ', '/', $bulan));

			$link_akhir = $tahun_strip."/".$bulan_strip."/";
		}
		if(!(is_null($categories))){
			$category=strtolower(str_replace($karakter,"",$categories));
			$category_strip = strtolower(str_replace(' ', '/', $category));
			$link_akhir = $category_strip."/";
			
		}
		if(!(is_null($slugs))){
				$slug=strtolower(str_replace($karakter,"",$slugs));
				$slug_strip = strtolower(str_replace(' ', '/', $slug));
				$link_akhir = $slug_strip."/";
			}
		
		$hapus_karakter_aneh = strtolower(str_replace($karakter,"",$content));
		
		
		
		$tambah_strip = strtolower(str_replace(' ', '-', $hapus_karakter_aneh));
		$link_akhir .= $id.'-'.$tambah_strip;
		return $link_akhir;
	}
}