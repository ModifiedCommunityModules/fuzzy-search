<?php

// wenn keywords aus Suche übergeben -> fuzzy search
if (($_GET['keywords']) && (MODULE_MCM_FUZZY_SEARCH_ACTIVATE_SUGGEST == 'true') && (MODULE_MCM_FUZZY_SEARCH_STATUS == 'true')) {

  require_once (DIR_FS_INC . 'xtc_get_products_image.inc.php');
  require_once (DIR_WS_CLASSES . 'mcm_fuzzy_search.php');

  $keywords = strtolower($_GET['keywords']);

  $Suggest = new FuzzySearch();

  $Suggest->getSuggest($keywords);
  
  $module_content_keywords = $Suggest->resultKeywords;
  $module_content_products = $Suggest->resultProducts;
  $parse_time = $Suggest->parse_time;

  if ($module_content_keywords){
    $smarty->assign('keyword_data', $module_content_keywords);
  } 
  if ($module_content_products){
    $info_smarty= new Smarty;
    $info_smarty->assign('tpl_path','templates/' . CURRENT_TEMPLATE . '/');
    $info_smarty->assign('language', $_SESSION['language']);
    $info_smarty->assign('module_content', $module_content_products);
    $info_smarty->caching = 0;
    $smarty->assign('suggest_products', $info_smarty->fetch(CURRENT_TEMPLATE . '/module/mcm_fuzzy_search.html'));      
  } 

  if (SEARCH_SHOW_PARSETIME == 'true'){
    $smarty->assign('PARSE_TIME', '<small>'.$parse_time.' s</small>');    
  }
}
?>