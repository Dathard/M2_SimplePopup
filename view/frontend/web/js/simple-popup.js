define([
    'jquery',
    'Magento_Ui/js/modal/modal',
    'jquery/jquery.cookie'
], function ($, modal) {
    return {
        popupSelector: '#dt-simple-popup-content',

        openPopup: function ()
        {
            if (! this._checkCookie()) {
                this._open();
            }
        },
        _checkCookie: function ()
        {
            var cookie = $.cookie('dt_simple_popup');

            return cookie === 'closed';
        },
        _open: function ()
        {
            var options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                buttons: [{
                    text: $.mage.__('Close'),
                    class: 'dt-simple-popup-close',
                    click: function () {
                        this.closeModal();
                    }
                }]
            };
            modal(options, $(this.popupSelector));
            $(this.popupSelector).modal('openModal');

            $(this.popupSelector).on('modalclosed', function() {
                $.cookie('dt_simple_popup', 'closed');
            });
        }
    }
});
