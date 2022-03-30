<?php

namespace Dathard\SimplePopup\Block\Popup;

use Dathard\SimplePopup\Model\Config;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Styles extends Template
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @param Context $context
     * @param Config $config
     * @param array $data
     */
    public function __construct(
        Context $context,
        Config $config,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->config = $config;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function getCode(): string
    {
        return $this->config->getStyles();
    }
}

