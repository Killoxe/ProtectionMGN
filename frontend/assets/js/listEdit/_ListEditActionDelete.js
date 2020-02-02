ListEditActionDelete = function(options) {
  ListEditExtension.apply(this, arguments);
};

ListEditActionDelete.prototype = $.extend(Object.create(ListEditExtension.prototype), {
  constructor: ListEditActionDelete,

  defaultOptions: function() {
    return {
      selector: ''
    };
  },

  registerEvents: function() {
    var self = this;

    this.listEdit.$itemsContainer.on('click', this.options.selector, function(e) {
      e.preventDefault();
      self.deleteItem($(this).closest(self.listEdit.options.itemSelector));
      return false;
    });
  },

  deleteItem: function($item) {
    this.listEdit.deleteItem($item);
  }
});
