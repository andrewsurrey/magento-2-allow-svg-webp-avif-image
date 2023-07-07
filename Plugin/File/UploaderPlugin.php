<?php
/**
 * Navigate Commerce
 *
 * @author       Navigate Commerce
 * @package      Navigate_AllowSvgWebpAvifImage
 * @copyright    Copyright (c) Navigate (https://www.navigatecommerce.com/)
 * @license      https://www.navigatecommerce.com/end-user-license-agreement
 */

namespace Navigate\AllowSvgWebpAvifImage\Plugin\File;

use Magento\MediaStorage\Model\File\Uploader;
use Navigate\AllowSvgWebpAvifImage\Helper\ImageHelper;

class UploaderPlugin
{
    /**
     * @var ImageHelper
     */
    private $imageHelper;

    /**
     * ImagePlugin constructor.
     * @param ImageHelper $imageHelper
     */
    public function __construct(
        ImageHelper $imageHelper
    ) {
        $this->imageHelper = $imageHelper;
    }

    /**
     * Add web images to the list ollowed extension for media storage
     *
     * @param Uploader $uploader
     * @param array $extensions
     * @return array
     */
    public function beforeSetAllowedExtensions(Uploader $uploader, $extensions = [])
    {
        $extensions = array_merge(
            $extensions,
            array_values($this->imageHelper->getVectorExtensions()),
            array_values($this->imageHelper->getWebImageExtensions())
        );

        return [$extensions];
    }
}
