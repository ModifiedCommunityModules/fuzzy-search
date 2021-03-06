<?php
use ModifiedCommunityModules\FuzzySearch\Classes\FuzzySearch;
// wenn keywords aus Suche übergeben -> fuzzy search
if (!isset($_GET['keywords']) || $_GET['keywords'] == '' || MODULE_MCM_FUZZY_SEARCH_ACTIVATE_SUGGEST != 'true' || MODULE_MCM_FUZZY_SEARCH_STATUS != 'true') return;

require_once DIR_FS_INC . 'xtc_get_products_image.inc.php';
require_once DIR_FS_DOCUMENT_ROOT . 'vendor-no-composer/autoload.php';

$keywords = strtolower($_GET['keywords']);

$Suggest = new FuzzySearch();
$Suggest->getSuggest($keywords);

$module_content_keywords = $Suggest->resultKeywords;
$module_content_products = $Suggest->resultProducts;
$parse_time = $Suggest->parse_time;

$info_smarty= new Smarty;
$info_smarty->assign('tpl_path','templates/' . CURRENT_TEMPLATE . '/');
$info_smarty->assign('language', $_SESSION['language']);

if ($module_content_keywords) {
  $info_smarty->assign('keyword_data', $module_content_keywords);
}
if ($module_content_products) {
  $info_smarty->assign('module_content', $module_content_products);
}

if (SEARCH_SHOW_PARSETIME == 'true') {
  $info_smarty->assign('PARSE_TIME', '<small>' . $parse_time . ' s</small>');
}

$info_smarty->caching = 0;

if ($module_content_keywords || $module_content_products) {
  $smarty->assign('mcm_fuzzy_search', $info_smarty->fetch(CURRENT_TEMPLATE . '/module/mcm_fuzzy_search.html'));
}
