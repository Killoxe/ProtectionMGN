CalculateOsagoFormPeopleListEditItem = function($element, options) {
    JQueryPlugin.apply(this, arguments);
};

CalculateOsagoFormPeopleListEditItem.prototype = $.extend(Object.create(ListEditItem.prototype), {
    constructor: CalculateOsagoFormPeopleListEditItem,
    pluginName: 'calculateOsagoFormPeopleListEditItem',

    initProperties: function() {
        ListEditItem.prototype.initProperties.apply(this, arguments);

        this.$label = this.$element.find('.list-edit__item-label');
    },

    prepareNewItem: function() {
        ListEditItem.prototype.prepareNewItem.apply(this, arguments);

        //TODO: пока такой костыль на изменение языка и даты в пререопределениях datepicker'а
        $.fn.kvDatepicker.defaults.format = 'dd.mm.yyyy';
        $.fn.kvDatepicker.defaults.language = 'ru';
        $.fn.kvDatepicker.defaults.autoclose = true;

        var $item = this.$element;
        var index= this.uniqueIndex;

        $item.find('[id *= "CalculateOsagoForm-people--1-"]').each(function(i, el){
            var $el = $(el);
            var id = $el.attr('id');
            var input = $el.find('input');

            id = id.replace('--1-', '-'+index+'-');
            $el.attr('id', id.replace('--1-', '-'+index+'-'));
            input.attr('data-datepicker-source', input.attr('data-datepicker-source').replace('--1-', '-'+index+'-'));
            $el.kvDatepicker();
        });
    },

    setPosition: function(value) {
        ListEditItem.prototype.setPosition.apply(this, arguments);
        this.$label.text('Водитель #'+value);
    },
});

JQueryPlugin.addToJQuery(CalculateOsagoFormPeopleListEditItem.prototype.pluginName, CalculateOsagoFormPeopleListEditItem);
