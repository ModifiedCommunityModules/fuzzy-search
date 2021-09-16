<?php
defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

use RobinTheHood\ModifiedStdModule\Classes\StdModule;
require_once DIR_FS_DOCUMENT_ROOT . '/vendor-no-composer/autoload.php';

class mcm_fuzzy_search extends StdModule
{
    public function __construct()
    {
        $this->init('MODULE_MCM_FUZZY_SEARCH');

        $this->addKey('ACTIVATE_SUGGEST');
        $this->addKey('PRODUCT_KEYWORDS');
        $this->addKey('PRODUCT_DESCRIPTION');
        $this->addKey('PROXIMITY_TRIGGER');
        $this->addKey('WEIGHT_LEVENSHTEIN');
        $this->addKey('WEIGHT_SIMILAR_TEXT');
        $this->addKey('WEIGHT_METAPHONE');
        $this->addKey('SPLIT_MINIMUM_LENGTH');
        $this->addKey('SPLIT_PRODUCT_NAMES');
        $this->addKey('SPLIT_PRODUCT_CHARS');
        $this->addKey('MAX_KEXWORD_SUGGESTS');
        $this->addKey('COUNT_PRODUCTS');
        $this->addKey('ENABLE_PROXIMITY_COLOR');
        $this->addKey('PROXIMITY_COLORS');
        $this->addKey('ENABLE_PRODUCTS_SUGGEST');
        $this->addKey('MAX_PRODUCTS_SUGGEST');
        $this->addKey('SHOW_PARSETIME');

    }
       
    public function display()
    {
        return $this->displaySaveButton();
    }

    function process($file) {

    }

    public function install()
    {
        parent::install();

        $this->addConfiguration('STATUS', 'false', 6, 1, 'select');

        $this->addConfiguration('ACTIVATE_SUGGEST', 'true', 22, 7, 'select');
        $this->addConfiguration('PRODUCT_KEYWORDS', 'false', 22, 8, 'select');
        $this->addConfiguration('PRODUCT_DESCRIPTION', 'false', 22, 9, 'select');
        $this->addConfiguration('PROXIMITY_TRIGGER', '70', 22, 10);
        $this->addConfiguration('WEIGHT_LEVENSHTEIN', '0', 22, 11);
        $this->addConfiguration('WEIGHT_SIMILAR_TEXT', '100', 22, 12);
        $this->addConfiguration('WEIGHT_METAPHONE', '0', 22, 13);
        $this->addConfiguration('SPLIT_MINIMUM_LENGTH', '3', 22, 14);
        $this->addConfiguration('SPLIT_PRODUCT_NAMES', 'true', 22, 15, 'select');
        $this->addConfiguration('SPLIT_PRODUCT_CHARS', '[ ,.]', 22, 16);
        $this->addConfiguration('MAX_KEXWORD_SUGGESTS', '6', 22, 17);
        $this->addConfiguration('COUNT_PRODUCTS', 'true', 22, 18, 'select');
        $this->addConfiguration('ENABLE_PROXIMITY_COLOR', 'true', 22, 19, 'select');
        $this->addConfiguration('PROXIMITY_COLORS', '#9f6;#cf6;#ff6;#fc9;#f99', 22, 20);
        $this->addConfiguration('ENABLE_PRODUCTS_SUGGEST', 'true', 22, 21, 'select');
        $this->addConfiguration('MAX_PRODUCTS_SUGGEST', '15', 22, 22);
        $this->addConfiguration('SHOW_PARSETIME', 'false', 22, 23, 'select');
    }

    public function remove()
    {
        parent::remove();
        $this->deleteConfiguration('ACTIVATE_SUGGEST');
        $this->deleteConfiguration('PRODUCT_KEYWORDS');
        $this->deleteConfiguration('PRODUCT_DESCRIPTION');
        $this->deleteConfiguration('PROXIMITY_TRIGGER');
        $this->deleteConfiguration('WEIGHT_LEVENSHTEIN');
        $this->deleteConfiguration('WEIGHT_SIMILAR_TEXT');
        $this->deleteConfiguration('WEIGHT_METAPHONE');
        $this->deleteConfiguration('SPLIT_MINIMUM_LENGTH');
        $this->deleteConfiguration('SPLIT_PRODUCT_NAMES');
        $this->deleteConfiguration('SPLIT_PRODUCT_CHARS');
        $this->deleteConfiguration('MAX_KEXWORD_SUGGESTS');
        $this->deleteConfiguration('COUNT_PRODUCTS', 'true');
        $this->deleteConfiguration('ENABLE_PROXIMITY_COLOR');
        $this->deleteConfiguration('PROXIMITY_COLORS');
        $this->deleteConfiguration('ENABLE_PRODUCTS_SUGGEST');
        $this->deleteConfiguration('MAX_PRODUCTS_SUGGEST');
        $this->deleteConfiguration('SHOW_PARSETIME');
    }
}