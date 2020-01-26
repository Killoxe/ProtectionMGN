AccordionWidget = function($element, options) {
    JQueryPlugin.apply(this, arguments);
};

AccordionWidget.prototype = $.extend(Object.create(JQueryPlugin.prototype), {
    constructor: AccordionWidget,
    pluginName: 'accordionWidget',

    init: function() {
        JQueryPlugin.prototype.init.apply(this, arguments);

        this.initProperties();
        this.registerEvents();
    },

    initProperties: function() {
        this.$label = this.$element.find(this.options.labelSelector);
    },

    registerEvents: function() {
        var self = this;

        this.$label.on('click', function (e) {
            var slideSpeed = 300;
            var $accordionItem = $(this).parent();
            var id = $accordionItem.data('key');

            self.$element.find(self.options.contentSelector+':not(:eq('+id+'))').slideUp(slideSpeed).parent().removeClass('is-open');
            $accordionItem.toggleClass('is-open').find(self.options.contentSelector).slideToggle(slideSpeed);
        });
    },
});

JQueryPlugin.addToJQuery(AccordionWidget.prototype.pluginName, AccordionWidget);
