(function($) {
    function AlbumsThumbnails() {
    }
    AlbumsThumbnails.prototype.options = {
        speed: 200,
        max: 600,
        min: 450,
        init: 500
    };
    AlbumsThumbnails.prototype._create = function() {
        this._on(this.element, {
            "click": "start"
        });
        this._on(document, {
            "keypress": "stop"
        });
    };
    AlbumsThumbnails.prototype.delay = null;
    AlbumsThumbnails.prototype.state = false;
    AlbumsThumbnails.prototype.start = function() {
        if (this.state) {
            this._showIn();
        } else {
            this._showOut();
        }
        this.state = !this.state;
        this.delay = this._delay("start", this.option
                ("interval"));
    };
    AlbumsThumbnails.prototype.stop = function() {
        clearTimeout(this.delay);
        this.state && this._showIn();
    };
    AlbumsThumbnails.prototype._showIn = function() {
        this.element.fadeIn(this.option("speed"))
    };
    AlbumsThumbnails.prototype._showOut = function() {
        this.element.fadeOut(this.option("speed"))
    };
    AlbumsThumbnails.prototype.disable = function() {
        this._super();
        this.stop();
    };
// http://api.jqueryui.com/jQuery.widget
    $.widget("nfq.nfqButtonBehavior", AlbumsThumbnails.prototype);
    $("button").nfqButtonBehavior({
    });
//$( "button:first" ).nfqButtonBehavior("start");
})(jQuery);