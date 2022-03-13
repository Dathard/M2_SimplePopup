<?php

namespace Dathard\SimplePopup\Model;

use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_CONTENT = 'simplepopup/general/popup_content';

    /**
     * @var FilterProvider
     */
    private $filterProvider;

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param FilterProvider $filterProvider
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        FilterProvider $filterProvider,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->filterProvider = $filterProvider;
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getContent(): string
    {
        $content = $this->scopeConfig->getValue(self::XML_PATH_CONTENT);

        return $this->filterProvider->getPageFilter()->filter($content);
    }
}
