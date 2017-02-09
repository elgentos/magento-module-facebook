<?php

class Srcode_FacebookPixel_Block_Module extends Mage_Core_Block_Template
{

    public function _toHtml()
    {
        return parent::_toHtml();
    }

    /**
     * @return Srcode_FacebookPixel_Helper_Data
     */
    public function getHelperPixel()
    {
        return Mage::helper('srcode_facebookpixel');
    }

    public function getPixelId(){
        return $this->getHelperPixel()->getPixelId();
    }

    /**
     * Get store current section
     * @return [type]
     */
    private function _getSection(){
        $pageSection  = Mage::app()->getFrontController()->getAction()->getFullActionName();
        return  $pageSection;
    }

    /**
     * Get current store currency
     * @return [type]
     */
    private function _getStoreCurrency(){
        return Mage::app()->getStore()->getCurrentCurrencyCode();
    }

    /**
     * Return View Content event track
     * @return [type]
     */
    public function getViewContentEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->viewContentEnabled()){
            if($pageSection == 'catalog_product_view'){
                return "fbq('track', 'ViewContent');";
            }
        }
    }

    /**
     * Return Search event track
     * @return [type]
     */
    public function getSearchEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->searchEnabled()){
            if($pageSection == 'catalogsearch_result_index' || $pageSection == 'catalogsearch_advanced_result'){
                return "fbq('track', 'Search');";
            }
        }
    }

    /**
     * Return AddToCart event track
     * @return [type]
     */
    public function getAddToCartEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->addToCartEnabled()){

            $pixelEvent = Mage::getModel('core/session')->getPixelAddToCart();
            if($pixelEvent){
                //Unset event
                Mage::getModel('core/session')->unsPixelAddToCart();
                return "fbq('track', 'AddToCart');";
            }
        }
    }

    /**
     * Return AddToWishlist event track
     * @return [type]
     */
    public function getAddToWishlistEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->addToWishlistEnabled()){
            $pixelEvent = Mage::getModel('core/session')->getPixelAddToWishlist();
            if($pixelEvent){
                //Unset event
                Mage::getModel('core/session')->unsPixelAddToWishlist();
                return "fbq('track', 'AddToWishlist');";
            }
        }
    }

    /**
     * Return InitiateCheckout event track
     * @return [type]
     */
    public function getInitiateCheckoutEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->initiateCheckoutEnabled()){
            if ($pageSection == 'checkout_onepage_index' || $pageSection == 'onestepcheckout_index_index' || $pageSection == 'opc_index_index'){
                return "fbq('track', 'InitiateCheckout');";
            }
        }
    }

    /**
     * Return Purchase event track
     * @return [type]
     */
    public function getPurchaseEvent(){
        $pageSection        = $this->_getSection();
        $currentCurrency    = $this->_getStoreCurrency();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->purchaseEnabled()){

            $pixelEvent = Mage::getModel('core/session')->getPixelPurchase();
            if($pixelEvent){
                //Unset event
                Mage::getModel('core/session')->unsPixelPurchase();

                $orderId            = Mage::getSingleton('checkout/session')->getLastRealOrderId();
                $order              = Mage::getModel('sales/order')->loadByIncrementId($orderId);
                $orderGrandTotal    = number_format($order->getGrandTotal(),2);

                return "fbq('track', 'Purchase', {
                    value:          '".$orderGrandTotal."',
                    currency:       '".$currentCurrency."'
                });";
            }
        }
    }

    /**
     * Return AddPaymentInfo event track
     * @return [type]
     */
    public function getAddPaymentInfoEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->addPaymentInfoEnabled()){
            $pixelEvent = Mage::getModel('core/session')->getPixelPaymentInfo();
            if($pixelEvent){
                //Unset event
                Mage::getModel('core/session')->unsPixelPaymentInfo();

                return "fbq('track', 'AddPaymentInfo');";
            }
        }
    }

    /**
     * Return Lead event track
     * @return [type]
     */
    public function getLeadEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->leadEnabled()){
            $pixelEvent = Mage::getModel('core/session')->getPixelLead();
            if($pixelEvent){
                //Unset event
                Mage::getModel('core/session')->unsPixelLead();

                return "fbq('track', 'Lead');";
            }
        }
    }

    /**
     * Return CompleteRegistration event track
     * @return [type]
     */
    public function getCompleteRegistrationEvent(){
        $pageSection = $this->_getSection();

        //Check if event is enabled
        if(Mage::helper('srcode_facebookpixel')->completeRegistrationEnabled()){
            $pixelEvent = Mage::getModel('core/session')->getPixelCompleteRegistration();
            if($pixelEvent){
                //Unset event
                Mage::getModel('core/session')->unsPixelCompleteRegistration();

                return "fbq('track', 'CompleteRegistration');";
            }
        }
    }

}


