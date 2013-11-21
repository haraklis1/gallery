(function($) {
    function AlbumsThumbnails() {
    }
    AlbumsThumbnails.prototype.options = {
        speed: 200,
        max: 400,
        min: 250,
        init: 300,
        margin: 10
    };
    AlbumsThumbnails.prototype._create = function() {
        this._on(this.element, {
            //        "click": "start"
        });
        this._on(window, {
            "resize": "recalculate"
        });

        this._init();
    };

    AlbumsThumbnails.prototype.thumbnails = [];

    AlbumsThumbnails.prototype._windowSize = function() {
        return {w: this.element.width() - (2 * this.option("margin")), h: 0};
    };
    AlbumsThumbnails.prototype._init = function() {
        this.thumbnails = [];
        var el;
        var children = this.element.children(".album-thumbnail");
        for (var i = 0; i < children.length; i++) {
            el = {w: 0, h: 0, ratio: 0, width: 0};
            el.w = $(children[i]).attr("data-width");
            el.h = $(children[i]).attr("data-height");
            el.ratio = el.w / el.h;
            this.thumbnails.push(el);
        }
        this.recalculate();
    };

    AlbumsThumbnails.prototype.recalculate = function() {
        this.element.find("div.clearfix").remove();
        
        var children = this.element.children(".album-thumbnail"),
                windowSize = this._windowSize(),
                offset = 0,
                ratio = 0,
                curH = 0;
        while (offset < this.thumbnails.length-1) {
            ratio = 0;
            for (var i = offset; i < this.thumbnails.length; i++) {
                ratio += this.thumbnails[i].ratio;
                curH = (windowSize.w - (i - offset + 1) * this.option("margin")) / ratio;
                if (curH <= this.option("max") || i == this.thumbnails.length - 1) {
                    if (curH < this.option("min")) {
                        ratio -= this.thumbnails[i].ratio;
                        i--;
                        curH = (windowSize.w - (i - offset + 1) * this.option("margin")) / ratio;
                    }
                    if(i == this.thumbnails.length - 1 && curH > this.option("max")){
                        curH = this.option("init");
                    }
                    curH = Math.floor(curH);
                    for (var ii = offset; ii <= i; ii++) {
                        this.thumbnails[ii].width = Math.floor(this.thumbnails[ii].ratio * curH);
                        if(isNaN(this.thumbnails[ii].width))
                            alert(this.thumbnails[ii].ratio + " * " + curH);
                        $(children[ii]).find(".album-thumbnail-photo").find("img").attr("width", this.thumbnails[ii].width).attr("height", curH);
                        $(children[ii]).css("margin-left",0).css("margin-right",this.option("margin")).css("margin-bottom",this.option("margin"));
                    }
                    $(children[offset]).css("margin-left",this.option("margin"));
                    $(children[i]).after("<div class=\"clearfix\"><div>");
                    offset = i + 1;
                    break;
                }
            }
        }
        
        console.log(this.thumbnails);
    };
    $.widget("awesomeirko.albumsThumbnails", AlbumsThumbnails.prototype);

// http://api.jqueryui.com/jQuery.widget
    $(document).ready(function() {
        $("#albums-thumbnails").albumsThumbnails();
    });
})(jQuery);