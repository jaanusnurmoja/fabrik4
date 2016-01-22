/**
 * Fabrik Window
 *
 * @copyright: Copyright (C) 2005-2014, fabrikar.com - All rights reserved.
 * @license:   GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

/**
 * Window factory
 *
 * @param   object  opts  Options
 *
 * @return  Fabrik.Window
 */
Fabrik.getWindow = function (opts) {
    if (Fabrik.Windows[opts.id]) {
        if (opts.visible !== false) {
            Fabrik.Windows[opts.id].open();
        }
        Fabrik.Windows[opts.id].setOptions(opts);
        // Fabrik.Windows[opts.id].loadContent();
    } else {
        var type = opts.type ? opts.type : '';
        switch (type) {
            case 'redirect':
                Fabrik.Windows[opts.id] = new Fabrik.RedirectWindow(opts);
                break;
            case 'modal':
                Fabrik.Windows[opts.id] = new Fabrik.Modal(opts);
                break;
            case '':
            /* falls through */
            default:
                Fabrik.Windows[opts.id] = new Fabrik.Window(opts);
                break;
        }
    }
    return Fabrik.Windows[opts.id];
};


Fabrik.Window = new Class({

    Implements: [Events, Options],

    options: {
        id               : 'FabrikWindow',
        title            : '&nbsp;',
        container        : false,
        loadMethod       : 'html',
        contentURL       : '',
        createShowOverLay: false,
        width            : 300,
        height           : 300,
        loadHeight       : 100,
        expandable       : true,
        offset_x         : null,
        offset_y         : null,
        visible          : true,
        modalId          : '',
        onClose          : function () {
        },
        onOpen           : function () {
        },
        onContentLoaded  : function () {
            this.fitToContent(false);
        },
        destroy          : true
    },

    modal: false,

    classSuffix: '',

    expanded: false,

    initialize: function (options) {
        this.options = jQuery.extend(this.options, options);
        this.makeWindow();
    },

    /**
     * Tabs can resize content area
     */
    watchTabs: function () {
        var self = this;
        jQuery('.nav-tabs a').on('mouseup', function () {
            self.fitToWidth();
            self.drawWindow();
        });
    },

    /**
     * Create a close button
     * @returns {DomNode}
     */
    deleteButton: function () {
        return jQuery(Fabrik.jLayouts['modal-close'])[0];
    },

    /**
     * Get the window's content height
     * @returns {number}
     */
    contentHeight: function () {
        var h = 0;
        this.window.children().each(function () {
            h = h + jQuery(this).outerHeight(true);
        });
        return h;
    },

    /**
     * Center the modal window
     */
    center: function () {
        var pxWidth = this.windowDimensionInPx('width'),
            w = this.window.css('width'),
            h = this.contentHeight();
        w = (w === null || w === 'auto') ? pxWidth : this.window.css('width');
        w = parseInt(w, 10);

        var d = {'width': w + 'px', 'height': h + 'px'};
        this.window.css(d);

        if (!(this.modal)) {
            var yy = window.getSize().y / 2 + window.getScroll().y - (h / 2);
            d.top = this.options.offset_y !== undefined ? window.getScroll().y + this.options.offset_y : yy;

            var xx = window.getSize().x / 2 + window.getScroll().x - w / 2;
            d.left = this.options.offset_x !== undefined ? window.getScroll().x + this.options.offset_x : xx;

        } else {
            // File-upload crop uses this
            var offset = (window.getSize().y - h) / 2;
            var xoffset = (window.getSize().x - w) / 2;
            d.top = offset < 0 ? window.getScroll().y : window.getScroll().y + offset;
            d.left = xoffset < 0 ? window.getScroll().x : window.getScroll().x + xoffset;
        }
        // Prototype J template css puts margin left on .modals
        d['margin-left'] = 0;
        this.window.css(d);
    },

    /**
     * Work out the modal/window width or height either from px or % variable
     *
     * @param   string  dir  Width or height.
     *
     * @return  int  Px width of window
     */
    windowDimensionInPx: function (dir) {
        var coord = dir === 'height' ? 'y' : 'x',
            dim = this.options[dir] + '';
        if (dim.indexOf('%') !== -1) {
            return Math.floor(window.getSize()[coord] * (dim.toFloat() / 100));
        }
        return parseInt(dim, 10);
    },

    /**
     * Build the window HTML, inject it into the document body
     */
    makeWindow: function () {
        var self = this, cw, ch;
        if (Fabrik.jLayouts[this.options.modalId]) {
            this.window = this.buildWinFromLayout();

        } else {
            this.window = this.buildWinViaJS();
        }

        // @todo check that this works with fileupload (which loads its content via a jLayout.
        this.loadContent();

        if (!this.options.visible) {
            this.window.fade('hide');
        }

        jQuery(this.window).find('.closeFabWin').on('click', function (e) {
            e.preventDefault();
            self.close();
        });

        cw = this.windowDimensionInPx('width');
        ch = this.windowDimensionInPx('height');
        this.contentWrapperEl.css({'height': ch, 'width': cw + 'px'});

        // Set window dimensions before center - needed for fileupload crop
        this.window.css('width', this.options.width);
        this.window.css('height', this.options.height);
        jQuery(document.body).append(this.window);

        this.center();
        //bad idea - means opening windows are hidden if other code calls another window to hide
        /*Fabrik.addEvent('fabrik.overlay.hide', function () {
         this.window.hide();
         }.bind(this));*/
    },

    /**
     * Build the window from a JLayout file. Note to ensure that content is unique you must create
     * a unique $modalId in your PHP: FabrikHelperHTML::jLayoutJs($modalId, 'fabrik-modal')
     *
     * @return {jQuery}
     */
    buildWinFromLayout: function () {
        var window = jQuery(Fabrik.jLayouts[this.options.modalId]);
        this.contentEl = window.find('.itemContentPadder');
        this.contentWrapperEl = window.find('div.contentWrapper');

        return window;
    },

    /**
     * Create Window via JS.
     * @deprecated
     * @returns {*}
     */
    buildWinViaJS: function () {
        var draggerC, dragger, expandButton, expandIcon, resizeIcon, label, handleParts = [], self = this;
        this.window = new Element('div', {
            'id'   : this.options.id,
            'class': 'fabrikWindow ' + this.classSuffix + ' modal'
        });
        //this.center();
        var del = this.deleteButton();

        var hclass = 'handlelabel';
        if (!this.modal) {
            hclass += ' draggable';
            draggerC = jQuery('<div />').addClass('bottomBar modal-footer');
            dragger = jQuery('<div />').addClass('dragger');
            resizeIcon = jQuery(Fabrik.jLayouts['icon-expand']);
            resizeIcon.prependTo(dragger);
            draggerC.append(dragger);
        }

        expandIcon = jQuery(Fabrik.jLayouts['icon-full-screen']);
        label = jQuery('<h3 />').addClass(hclass).text(this.options.title);

        handleParts.push(label);
        if (this.options.expandable && this.modal === false) {
            expandButton = jQuery('<a />').addClass('expand').attr({
                'href': '#'
            }).on('click', function (e) {
                self.expand(e);
            }).append(expandIcon);
            handleParts.push(expandButton);
        }

        handleParts.push(del);
        this.handle = this.getHandle().append(handleParts);

        var bottomBarHeight = 15;
        var topBarHeight = 15;
        var contentHeight = this.options.height - bottomBarHeight - topBarHeight;
        if (contentHeight < this.options.loadHeight) {
            contentHeight = this.options.loadHeight;
        }
        this.contentWrapperEl = jQuery('<div />').addClass('contentWrapper').css({
            'height': contentHeight + 'px'
        });
        var itemContent = jQuery('<div />').addClass('itemContent');
        this.contentEl = jQuery('<div />').addClass('itemContentPadder');
        itemContent.append(this.contentEl);
        this.contentWrapperEl.append(itemContent);

        if (this.modal) {
            this.window.append([this.handle, this.contentWrapperEl]);
        } else {
            this.window.append([this.handle, this.contentWrapperEl, draggerC]);
            this.window.draggable(
                {
                    'handle': dragger,
                    drag    : function () {
                        Fabrik.fireEvent('fabrik.window.resized', this.window);
                        this.drawWindow();
                    }.bind(this)
                }
            ).resizable();
            var dragOpts = {'handle': this.handle};
            dragOpts.onComplete = function () {
                Fabrik.fireEvent('fabrik.window.moved', this.window);
                this.drawWindow();
            }.bind(this);
            dragOpts.container = this.options.container ? jQuery('#' + this.options.container) : null;
            this.window.makeDraggable(dragOpts);
        }

        return this.window;
    },

    /**
     * toggle the window full screen
     */
    expand: function (e) {
        e.stopPropagation();
        if (!this.expanded) {
            this.expanded = true;
            var w = window.getSize();
            this.unexpanded = this.window.getCoordinates();
            var scroll = window.getScroll();
            this.window.setPosition({'x': scroll.x, 'y': scroll.y}).css({'width': w.x, 'height': w.y});
        } else {
            this.window.setPosition({
                'x': this.unexpanded.left,
                'y': this.unexpanded.top
            }).css({'width': this.unexpanded.width, 'height': this.unexpanded.height});
            this.expanded = false;
        }
        this.drawWindow();
    },

    getHandle: function () {
        var c = this.handleClass();
        return jQuery('<div />').addClass('draggable ' + c);
    },

    handleClass: function () {
        return 'modal-header';
    },

    loadContent: function () {
        var u, self = this;
        window.fireEvent('tips.hideall');
        switch (this.options.loadMethod) {

            case 'html':
                if (this.options.content === undefined) {
                    fconsole('no content option set for window.html');
                    this.close();
                    return;
                }
                if (typeOf(this.options.content) === 'element') {
                    this.options.content.inject(this.contentEl.empty());
                } else {
                    this.contentEl.html(this.options.content);
                }
                this.options.onContentLoaded.apply(this);
                this.watchTabs();
                break;
            case 'xhr':
                Fabrik.loader.start(self.contentEl);
                new jQuery.ajax({
                    'url'   : this.options.contentURL,
                    'data'  : {'fabrik_window_id': this.options.id},
                    'method': 'post',
                }).success(function (r) {
                        self.contentEl.append(r);
                        Fabrik.loader.stop(self.contentEl);
                        self.options.onContentLoaded.apply(self);
                        self.watchTabs();

                        // Needed for IE11
                        self.center();
                        // Ini any Fabrik JS code that was loaded with the ajax request
                        // window.trigger('fabrik.loaded');
                    });
                break;
            case 'iframe':
                var h = this.options.height - 40,
                    scrollX = this.contentEl[0].scrollWidth,
                    w = scrollX + 40 < jQuery(window).width() ? scrollX + 40 : jQuery(window).width();
                u = this.window.getElement('.itemContent');
                Fabrik.loader.start(u);

                if (this.iframeEl) {
                    this.iframeEl.remove();
                }
                this.iframeEl = jQuery('<iframe />').addClass('fabrikWindowIframe').attr({
                    'id'          : this.options.id + '_iframe',
                    'name'        : this.options.id + '_iframe',
                    'class'       : 'fabrikWindowIframe',
                    'src'         : this.options.contentURL,
                    'marginwidth' : 0,
                    'marginheight': 0,
                    'frameBorder' : 0,
                    'scrolling'   : 'auto',
                }).css({
                    'height': h + 'px',
                    'width' : w
                }).inject(this.window.find('.itemContent'));
                this.iframeEl.hide();
                this.iframeEl.on('load', function () {
                    Fabrik.loader.stop(self.window.find('.itemContent'));
                    self.iframeEl.show();
                    self.trigger('onContentLoaded', [self]);
                    self.watchTabs();
                });
                break;
        }
    },

    drawWindow: function () {
        var titleHeight = this.window.find('.' + this.handleClass());
        titleHeight = titleHeight.length > 0 ? titleHeight.height() : 25;
        var footer = this.window.find('.bottomBar').height();
        this.contentWrapperEl.css('height', this.window.height() - (titleHeight + footer));
        this.contentWrapperEl.css('width', this.window.width() - 2);

        // Resize iframe when window is resized
        if (this.options.loadMethod === 'iframe') {
            this.iframeEl.css('height', this.contentWrapperEl[0].offsetHeight - 40);
            this.iframeEl.css('width', this.contentWrapperEl[0].offsetWidth - 10);
        }
    },

    fitToContent: function (scroll, center) {
        scroll = scroll === undefined ? true : scroll;
        center = center === undefined ? true : center;

        if (this.options.loadMethod !== 'iframe') {
            // As iframe content may not be on the same domain we CAN'T
            // guarantee access to its body element to work out its dimensions
            this.fitToHeight();
            this.fitToWidth();
        }
        this.drawWindow();
        if (center) {
            this.center();
        }
        if (!this.options.offset_y && scroll) {
            new Fx.Scroll(window).toElement(this.window);
        }
    },

    /**
     * Fit the window height to the min of either its content height or the window height
     */
    fitToHeight: function () {
        var testH = this.contentHeight(),
            winHeight = jQuery(window).height(),
            h = testH < winHeight ? testH : winHeight;
        this.window.css('height', h);
    },

    /**
     * Fit the window width to the min of either its content width or the window width
     */
    fitToWidth: function () {
        var contentEl = this.window.find('.itemContent'),
            winWidth = jQuery(window).width(),
            x = contentEl[0].scrollWidth;
        var w = x + 25 < winWidth ? x + 25 : winWidth;
        this.window.css('width', w);
    },

    /**
     * Close the window
     * @param {event} e
     */
    close: function (e) {

        if (e) {
            e.stopPropagation();
        }
        // By default cant destroy as we want to be able to reuse them (see crop in fileupload element)
        if (this.options.destroy) {

            // However db join add (in repeating group) has a fit if we don't remove its content
            this.window.destroy();
            delete(Fabrik.Windows[this.options.id]);
        } else {
            this.window.fadeOut({duration: 0});
        }
        this.fireEvent('onClose', [this]);
    },

    /**
     * Open the window
     * @param {event} e
     */
    open: function (e) {
        if (e) {
            e.stopPropagation();
        }
        this.window.fadeIn({duration: 0});
        this.fireEvent('onOpen', [this]);
    }

});

Fabrik.Modal = new Class({
    Extends: Fabrik.Window,

    modal: true,

    classSuffix: 'fabrikWindow-modal',

    getHandle: function () {
        return jQUery('<div />').addClass(this.handleClass());
    }
});

Fabrik.RedirectWindow = new Class({
    Extends   : Fabrik.Window,
    initialize: function (opts) {
        var opts2 = {
            'id'         : 'redirect',
            'title'      : opts.title ? opts.title : '',
            loadMethod   : loadMethod,
            'width'      : opts.width ? opts.width : 300,
            'height'     : opts.height ? opts.height : 320,
            'minimizable': false,
            'collapsible': true

        };
        opts2.id = 'redirect';
        opts = jQuery.merge(opts2, opts);
        var loadMethod, url = opts.contentURL;
        //if its a site page load via xhr otherwise load as iframe
        opts.loadMethod = 'xhr';
        if (!url.contains(Fabrik.liveSite) && (url.contains('http://') || url.contains('https://'))) {
            opts.loadMethod = 'iframe';
        } else {
            if (!url.contains('tmpl=component')) {
                opts.contentURL += url.contains('?') ? '&tmpl=component' : '?tmpl=component';
            }
        }
        this.options = jQuery.extend(this.options, opts);
        this.makeWindow();
    }
});
