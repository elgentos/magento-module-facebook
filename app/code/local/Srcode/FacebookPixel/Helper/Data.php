<?php

/**
 * Srcode Facebook Pixel
 * @author: Joey (joey@srcode.nl)
 */
class Srcode_FacebookPixel_Helper_Data extends Mage_Core_Helper_Abstract
{

    /** Defining all variables */

    const ENABLED_MODULE = 'facebookpixel/general/enabled';
    const PIXEL_ID = 'facebookpixel/general/pixel_id';

//    const VIEW_CONTENT = 'facebookpixel/content/viewcontent';
//    const SEARCH = 'facebookpixel/content/search';
//    const ADD_TO_CART = 'facebookpixel/content/cart';
//    const ADD_TO_WISHLIST = 'facebookpixel/content/wishlist';
//
//    const INITIATE_CHECKOUT = 'facebookpixel/contentbackend/checkout';
//    const ADD_PAYMENT_INFO = 'facebookpixel/contentbackend/payment';
//    const MAKE_PURCHASE = 'facebookpixel/contentbackend/purchase';
//
//    const LEAD = 'facebookpixel/contentbackend/lead';
//    const COMPLETE_REGISTRATION = 'facebookpixel/contentbackend/success';

    /**
     * Check if module is enabled
     * @param  [type]     $store
     * @return boolean
     */
    public function isEnabled($store = null)
    {
        return Mage::getStoreConfig(self::ENABLED_MODULE, $store)
            && strlen($this->getPixelId($store)) > 0;


//        $pixelId = $this->getPixelId($store);
    }
    /** CHECKS IF THE PIXEL ID IS SET
     * @param  [type]     $store
     * @return boolean
     */
    public function getPixelId($store = null)
    {
        return Mage::getStoreConfig(self::PIXEL_ID, $store);
    }

//    /** CHECKS IF VIEWCONTENT IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function viewContentEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::VIEW_CONTENT, $store);
//    }
//
//    /** CHECKS IF SEARCH IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function searchEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::SEARCH, $store);
//    }
//
//    /** CHECKS IF ADD TO CART IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function addToCartEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::ADD_TO_CART, $store);
//    }
//
//    /** CHECKS IF ADD TO WISHLIST IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function addToWishlistEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::ADD_TO_WISHLIST, $store);
//    }
//
//    /** CHECKS IF ADD TO INITIATE CHECKOUT IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function initiateCheckoutEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::INITIATE_CHECKOUT, $store);
//    }
//
//    /** CHECKS IF ADD PAYMENT INFO IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function addPaymentInfoEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::ADD_PAYMENT_INFO, $store);
//    }
//
//    /** CHECKS IF MAKE PURCHASE IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function purchaseEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::MAKE_PURCHASE, $store);
//    }
//
//    /** CHECKS IF LEAD IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function leadEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::LEAD, $store);
//    }
//
//    /** CHECKS IF COMPLETE REGISTRATION IS ENABLED
//     * @param  [type]     $store
//     * @return boolean
//     */
//    public function completeRegistrationEnabled($store = null)
//    {
//        return Mage::getStoreConfig(self::COMPLETE_REGISTRATION, $store);
//    }
}


