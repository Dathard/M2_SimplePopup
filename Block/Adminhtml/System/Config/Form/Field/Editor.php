<?php

namespace Dathard\SimplePopup\Block\Adminhtml\System\Config\Form\Field;

use Magento\Backend\Block\Template\Context;
use Magento\Cms\Model\Wysiwyg\Config as WysiwygConfig;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Editor extends Field
{
    /**
     * @var WysiwygConfig
     */
    private $wysiwygConfig;

    /**
     * @param Context $context
     * @param WysiwygConfig $wysiwygConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        WysiwygConfig $wysiwygConfig,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->wysiwygConfig = $wysiwygConfig;
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $element->setWysiwyg(true);
        $element->setConfig($this->getWysiwygConfig());
        return parent::_getElementHtml($element) . $this->getAdditionalJs();
    }

    /**
     * @return \Magento\Framework\DataObject
     */
    private function getWysiwygConfig()
    {
        return $this->wysiwygConfig->getConfig(
            [
                'add_variables' => true,
                'add_widgets' => true,
                'add_images' => true
            ]
        );
    }

    /**
     * @return string
     */
    private function getAdditionalJs(): string
    {
        return <<<ADDITIONALJS
<script type='text/javascript'>
    require(['Magento_Variable/variables']);
</script>
ADDITIONALJS;
    }
}
