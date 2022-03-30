<?php

namespace Dathard\SimplePopup\Model;

use Magento\Cms\Model\Template\FilterProvider;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    const XML_PATH_COOKIE_TIMEOUT = 'simplepopup/general/cookie_timeout';
    const XML_PATH_STYLES = 'simplepopup/general/popup_styles';
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
     * @return int
     */
    public function getCookieTimeout(): int
    {
        return $this->scopeConfig->getValue(self::XML_PATH_COOKIE_TIMEOUT);
    }

    /**
     * @return string
     */
    public function getStyles(): string
    {
        return (string) $this->scopeConfig->getValue(self::XML_PATH_STYLES);
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
