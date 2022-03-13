<?php

namespace Dathard\SimplePopup\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class DisplayPopup
{
    public function toOptionArray()
    {
        return [
            'on_scroll' => 'On Scroll'
        ];
    }
}
