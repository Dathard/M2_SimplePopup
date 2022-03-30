define([
    'jquery',
    'Magento_Ui/js/modal/modal',
    'jquery/jquery.cookie'
], function ($, modal) {
    return {
        popupSelector: '#dt-simple-popup-content',

        openPopup: function (cookieTimeout = 0)
        {
            if (! this._checkCookie()) {
                this._open(cookieTimeout);
            }
        },
        _checkCookie: function ()
        {
            var cookie = $.cookie('dt_simple_popup');

            return cookie === 'closed';
        },
        _open: function (cookieTimeout = 0)
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
                if (cookieExpires > 0) {
                    var date = new Date();
                    date.setTime(date.getTime() + (cookieExpires * 1000));
                    $.cookie('dt_simple_popup', 'closed', { expires: date });
                } else {
                    $.cookie('dt_simple_popup', 'closed');
                }
            });
        }
    }
});
