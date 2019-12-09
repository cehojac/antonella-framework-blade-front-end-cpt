<?php
    namespace HIJKL;
    use Jenssegers\Blade\Blade;
    class TemplateController
    {
        public function __construct()
        {
        }
        public static function my_theme_redirect() {
			
            global $wp;
            $posttype = 'moto';
            $from='';
            if ($wp->query_vars["post_type"] == $posttype || $wp->query_vars["post_format "] == $postype ) {
                $templatefilename = is_post_type_archive($posttype)?'archive-property.php':'single-property.php';
                if (file_exists(TEMPLATEPATH . '/' . $templatefilename)) {
                    $return_template = TEMPLATEPATH . '/' . $templatefilename;
                } else {
                   $return_template = 'moto';
                   $from='blade';
                }
                self::do_theme_redirect($return_template,$from);
            } 
			
        }
        public static function do_theme_redirect($url,$from) {
            global $post, $wp_query;
            $blade = new Blade(plugin_dir_path(__DIR__ ).'resources/views', plugin_dir_path( __DIR__ ).'storage/cache');
            if($from=='' && have_posts() )
            {
                include($url);
                die();
            }
            elseif($from=='blade' &&have_posts())
            {
                echo $blade->render('motos',['have_post'=>$post]); 
                die();
            }
            else
            {
                $wp_query->is_404 = true;
            }
        }
    }