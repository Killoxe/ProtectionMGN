CalculateOsagoFormPeopleListEditActionDelete = function(options) {
    ListEditExtension.apply(this, arguments);
};

CalculateOsagoFormPeopleListEditActionDelete.prototype = $.extend(Object.create(ListEditExtension.prototype), {
    constructor: CalculateOsagoFormPeopleListEditActionDelete,

    defaultOptions: function() {
        return {
            selector: ''
        };
    },

    registerEvents: function() {
        var self = this;

        this.listEdit.$itemsContainer.on('click', this.options.selector, function(e) {
            e.preventDefault();

            if ($('.list-edit__item').length > 1) {
                self.deleteItem($(this).closest(self.listEdit.options.itemSelector));
            }

            return false;
        });
    },

    deleteItem: function($item) {
        this.listEdit.deleteItem($item);
    }
});
