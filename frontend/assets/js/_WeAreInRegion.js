WeAreInRegion = function($element, options) {
    JQueryPlugin.apply(this, arguments);
};

WeAreInRegion.prototype = $.extend(Object.create(JQueryPlugin.prototype), {
    constructor: WeAreInRegion,
    pluginName: 'weAreInRegion',

    init: function() {
        JQueryPlugin.prototype.init.apply(this, arguments);

        this.initProperties();
        this.registerEvents();
        this.showDefaultMap(this.options.displayedMapId);
    },

    initProperties: function() {
        this.$mapList = this.$element.find(this.options.mapListSelector);
        this.$btnShowInMap = this.$element.find(this.options.buttonShowInMapSelector);
    },

    registerEvents: function() {
        var self = this;

        this.$btnShowInMap.on('click', function (e) {
            var src = self.options.srcItems,
                map = self.$mapList.find('iframe');

            map.animate({opacity: 0}, 300).attr('src', src[$(this).data('map-id')]).animate({opacity: 1}, 300);
        });
    },

    showDefaultMap: function(id) {
        this.$mapList.find('iframe').attr('src', this.options.srcItems[id]);
    }
});

JQueryPlugin.addToJQuery(WeAreInRegion.prototype.pluginName, WeAreInRegion);
