<?php
/**
 * Created by LYY
 * Date: 2018/1/18
 * Time: 10:55
 */
class Product{
    protected $_type = '';
    protected $_size = '';
    protected $_color = '';

    /**
     * @param string $type
     */
    public function setType($type){
        $this->_type = $type;
    }

    /**
     * @param string $size
     */
    public function setSize($size){
        $this->_size = $size;
    }

    /**
     * @param string $color
     */
    public function setColor($color){
        $this->_color = $color;
    }
}

class ProductBuilder{
    protected $_product = NULL;
    protected $_configs = array();

    public function __construct($configs){
        $this->_product = new Product();
        $this->_configs = $configs;
    }

    public function build(){
        $this->_product->setSize($this->_configs['size']);
        $this->_product->setType($this->_configs['type']);
        $this->_product->setColor($this->_configs['color']);
    }

    public function getProduct(){
        return $this->_product;
    }
}

$productConfigs = array('type' => 'shirt',
    'size' => 'XL',
    'color' => 'red');

$product = new Product();
$product->setType($productConfigs['type']);
$product->setSize($productConfigs['size']);
$product->setColor($productConfigs['color']);